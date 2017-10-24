<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
}
