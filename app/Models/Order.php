<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'tabel_id',
        'dish_id',
        'status',
        'note',
        'payment',
        'payment_status',
    ];
}
