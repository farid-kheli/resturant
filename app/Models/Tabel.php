<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tabel extends Model
{
    protected $fillable = ['number', 'qr_code', 'capacity'];
}
