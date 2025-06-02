<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manu extends Model
{
    protected $fillable = ['dishname', 'discription', 'price', 'category', 'image', 'rating'];
}
