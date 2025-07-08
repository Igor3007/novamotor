<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected function casts()
    {
        return [
            'analogs' => 'array'
        ];
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('medium')
            ->performOnCollections('default')
            ->width(500)
            ->height(500)
            ->keepOriginalImageFormat()
            ->nonQueued();
        $this->addMediaConversion('small')
            ->performOnCollections('default')
            ->width(75)
            ->height(75)
            ->keepOriginalImageFormat()
            ->nonQueued();
    }

    protected function formatMinPrice(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => number_format($attributes['min_price'], 2, ',', ' '),
        );
    }

    protected function url(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => route('product', ['slug' => $attributes['slug']]),
        );
    }

    /**
     * Get analog products urls
     * @return Attribute
     */
    protected function analogProducts(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes): array {
                if (is_null($attributes['analogs'])) {
                    return [];
                }
                $analogs = json_decode($attributes['analogs']) ?? [];
                $productIds = [];
                foreach ($analogs as $analog) {
                    $productIds[] = $analog->product_id;
                }

                $products = Product::query()->active()->whereIn('id', $productIds)
                    ->orderBy('sorting')->get();

                $analogProducts = [];
                foreach ($products as $product) {
                    $analogProducts[] = [
                        'title' => $product->title,
                        'url' => $product->url,
                    ];
                }
                return $analogProducts;
            },
        );
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('active', true);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function offers(): HasMany
    {
        return $this->hasMany(Offer::class)->active()->orderBy('sorting');
    }

    public function images(): HasMany
    {
        return $this->hasMany(\Spatie\MediaLibrary\MediaCollections\Models\Media::class, 'model_id', 'id')
            ->where('model_type', '=', self::class)
            ->where('collection_name', '=', 'default')
            ->orderBy('order_column');
    }

    public function files(): BelongsToMany
    {
        return $this->belongsToMany(ProductFile::class);
    }

    public function properties(): BelongsToMany
    {
        return $this->belongsToMany(Property::class)->withPivot('value')->active()->orderBy('sorting');
    }
    public function categoryProperties(): BelongsToMany
    {
        return $this->belongsToMany(Property::class)->withPivot('value')
            ->where('show_in_category', '=', 1)
            ->active()->orderBy('sorting');
    }
}
