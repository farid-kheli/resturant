<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\User;
class AdminController extends Controller
{
    public function DeleteReview(Review $id){
        $id->delete();
        return response()->json(['message' => 'review deleted successfully']);
    }
    public function GetUsers(){
        $users = User::where('role', 'User')->first();
        return response()->json($users);
    }
    public function GetStaff(){
        $users = User::where('role', 'Staff')->first();
        return response()->json($users);
    }
}
