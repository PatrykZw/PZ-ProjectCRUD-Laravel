<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'image_path',
        'make',
        'model',
        'body_shape',
        'fuel',
        'transmission',
        'engine',
        'engine_capacity',
        'status',
        'day_repayment',
        'rental_date',
        'return_date'
    ];
}