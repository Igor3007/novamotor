<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DocumentGroup extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class,'group_id')->active()->orderBy('sorting');
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('active', true);
    }
}
