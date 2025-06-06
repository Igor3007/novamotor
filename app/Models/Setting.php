<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected function casts(): array
    {
        return [
            'phones' => 'array',
            'worktimes' => 'array',
        ];
    }

    /**
     * Get first phone
     * @return Attribute
     */
    protected function phone(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => json_decode($attributes['phones'],true)[0]['phone']
        );
    }
}
