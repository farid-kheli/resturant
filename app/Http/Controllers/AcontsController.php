<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acont;
use App\Models\Role;
use App\Models\User;
use App\Models\Manu;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str; // Add this line

class AcontsController extends Controller
{
    public function store(Request $request) 
    {
        $request->validate([
            'name' => 'required|unique:users,name', 
            'role' => 'required|exists:roles,rolename',
            'password' => 'required',
            'email' => 'required|email|unique:users,email',
        ]);
        
        $request->merge(['password' => Hash::make($request->password)]);

        $acont = User::create($request->all());

        return response()->json(['message' => 'User registered successfully']);
    }

    public function StoreMenu(Request $request)
    {
        $request->validate([
            'dishname' => 'required',
            'discription' => 'required',
            'price' => 'required',
            'category' => 'required',
            'image' => 'required|image',
        ]);

        // Handle the file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->move(public_path('img'), $imageName);
            $imageUrl = url('img/' . $imageName); // Save the complete URL path
            $request->merge(['image' => $imageUrl]);
        }

        $request->merge(['rating' => 0]);
        $menu = Manu::create(
            [
                'dishname' => $request->dishname,
                'discription' => $request->discription,
                'price' => $request->price,
                'category' => $request->category,
                'image' =>  $imageUrl,
                'rating' => $request->rating,
            ]

        );

        return response()->json(['message' => 'Menu item added successfully', 'path' => $imageUrl]);
    }

    public function updateMenu(Request $request, $id)
    {
        // Logic to update a menu item
        // Validate the request
        $request->validate([
            'dishname' => 'sometimes|string|max:255',
            'discription' => 'sometimes|string|max:255',
            'price' => 'sometimes|numeric',
            'category' => 'sometimes|string',
            'image' => 'sometimes|image',
            'rating' => 'sometimes|image',

        ]);

        // Find the menu item by ID and update it
        $menuItem = Manu::findOrFail($request->id);
        $menuItem->update($request->all());

        return response()->json(['message' => 'Menu item updated successfully']);
    }

    public function destroyMenu(Request $request,$id)
    {
        // Logic to delete a menu item
        // Validate the request
       

        // Find the menu item by ID and delete it
        $menuItem = Manu::findOrFail($id);
        $menuItem->delete();

        return response()->json(['message' => 'Menu item deleted successfully']);
    }
}
