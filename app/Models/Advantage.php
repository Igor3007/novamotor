<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advantage extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function scopeList(Builder $query) : Builder
    {
        return $query->orderBy('sorting')->where('active','=',1);
    }
}
