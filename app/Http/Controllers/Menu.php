<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish; 

class Menu extends Controller
{
    public function GetMenu(){
        $menu = Dish::all();
        return response()->json($menu);
    }
}
