<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Category extends Model
{
    use HasFactory;

    public function scopeCatalog(Builder $query): Builder
    {
        return $query->with('products')->active()->orderBy('sorting')->orderBy('title');
    }

    protected function url(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attributes) => route('category', ['slug' => $attributes['slug']]),
        );
    }

    /**
     * @return Attribute
     */
    protected function shortTitle(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attributes) => trim(str_replace('Электродвигатели','', $attributes['title'])),
        );
    }

    protected function firstLowerCharTitle(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attributes) => mb_strtolower(mb_substr($attributes['title'], 0, 1)) . mb_substr($attributes['title'], 1),
        );
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('active', true);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class)->active()->orderBy('sorting')->orderBy('title');
    }
}
