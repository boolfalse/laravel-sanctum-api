<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'id', // id
        'title', // string
        'slug', // unique
        'description', // text nullable
        'price', // decimal 5 2
    ];
}
