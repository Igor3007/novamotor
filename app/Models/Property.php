<?php
declare(strict_types=1);

namespace App\Models;

use App\Collections\PropertyCollection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function scopeCategory(Builder $query): Builder
    {
        return $query->where('show_in_category', '=', true)->active()->orderBy('sorting');
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('active', '=', true);
    }
}
