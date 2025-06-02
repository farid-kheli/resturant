<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Manu;
use App\Models\Review;

class UsersController extends Controller
{
    public function index()
    {
        $users = Manu::all();
        return response()->json($users);
    }

    public function storeReview(Request $request)
    {
        $validatedData = $request->validate([
            'manu_id' => 'required|exists:manus,id',
            'review' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $review = new Review();
        $review->user_id = auth()->id();
        $review->manu_id = $validatedData['manu_id'];
        $review->review = $validatedData['review'];
        $review->rating = $validatedData['rating'];
        $review->save();

        return response()->json(['status' => 'success', 'message' => 'Review submitted successfully', 'data' => $review]);
    }
}
