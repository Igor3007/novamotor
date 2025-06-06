<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HowBuyBlock extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function scopeActive(Builder $query) : Builder
    {
        return $query->where('active', true);
    }
}
