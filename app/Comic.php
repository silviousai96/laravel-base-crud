<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    protected $fillable = [
        'name',
        'description',
        'editor',
        'image',
        'genre',
        'price'
    ];
}
