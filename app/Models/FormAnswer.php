<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormAnswer extends Model
{
    protected $fillable = [
        'page',
        'form_name',
        'name',
        'company',
        'phone',
        'email',
        'message',
    ];
}
