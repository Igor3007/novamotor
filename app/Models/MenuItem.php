<?php

declare(strict_types=1);

namespace App\Models;

use App\Collections\MenuItemCollection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MenuItem extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * Get site menus
     * @return MenuItemCollection
     */
    public function getTree(): MenuItemCollection {
        return self::query()->with('menu')
            ->orderBy('sorting')
            ->get()->tree();
    }

    public function newCollection(array $models = []): MenuItemCollection
    {
        return new MenuItemCollection($models);
    }

    public function scopeTree(Builder $query) : MenuItemCollection
    {
        return $query->with('menu')
            ->orderBy('sorting')
            ->get()->tree();
    }

    public function scopeMenuType($query, string $type) : Builder
    {
        return $query->whereHas('menu', function ($q) use ($type) {
            $q->where('slug', $type);
        });
    }

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(MenuItem::class,'parent_id','id')->where('parent_id',0);
    }
}
