<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class AdminController extends Controller
{
    public function DeleteReview(Review $id){
        $id->delete();
        return response()->json(['message' => 'review deleted successfully']);
    }
}
