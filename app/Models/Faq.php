<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Faq extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeCatalog(Builder $query): Builder
    {
        return $query->orderBy('sorting')
            ->where('active', '=', 1)
            ->where('show_in_catalog', '=', 1);
    }

    /**
     * @param Builder $query
     * @param Category $category
     * @return Builder
     */
    public function scopeCategory(Builder $query, Category $category): Builder
    {
        return $query->whereHas('categories', function ($q) use ($category) {
            $q->where('categories.id', '=', $category->id);
        })
            ->orderBy('sorting')
            ->where('active', '=', 1);
    }

    /**
     * @param Builder $query
     * @param Product $product
     * @return Builder
     */
    public function scopeProduct(Builder $query, Product $product): Builder
    {
        return $query->whereHas('products', function ($q) use ($product) {
            $q->where('products.id', '=', $product->id);
        })
            ->orderBy('sorting')
            ->where('active', '=', 1);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeObjects(Builder $query): Builder
    {
        return $query->orderBy('sorting')
            ->where('active', '=', 1)
            ->where('show_in_objects', '=', 1);
    }


    /**
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * @return BelongsToMany
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
