<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Offer extends Model
{
    use HasFactory;

    protected function formatPrice(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => number_format($attributes['price'],2,',',' ').'&nbsp₽',
        );
    }

    public function product() : BelongsTo {
        return $this->belongsTo(Product::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::created(static fn (Offer $model) => $model->setProductMinPrice());
        static::updated(static fn (Offer $model) => $model->setProductMinPrice());
        static::deleted(static fn (Offer $model) => $model->setProductMinPrice());
    }

    private function setProductMinPrice(): void
    {
        $product = $this->product;
        $minPrice = Offer::query()->where('product_id','=',$product->id)
            ->active()->min('price');

        $product->min_price = $minPrice ?? 0;
        $product->saveQuietly();
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('active', true);
    }
}
