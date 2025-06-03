<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tabel;
use App\Models\Order;

class OrderController extends Controller
{
    public function Order($tableID,Request $request){
        $request->validate([
            'dish_id' => 'required|integer|exists:dishes,id',
            'note' => 'nullable|string|max:255',
            'payment' => 'required|numeric|min:0',
            'payment_status' => 'required|string|in:paid,unpaid',
        ]);
        Order::create([
            'tabel_id' => $tableID,
            'dish_id' => $request->input('dish_id'),
            'status' => 'pending',
            'note' => $request->input('note'),
            'payment' => $request->input('payment'),
            'payment_status' => $request->input('payment_status'),
        ]);
        return response()->json([
            'message' => 'Order created successfully',
            'order' => Order::where('tabel_id', $tableID)->get(),
        ], 201);
    }
    public function GetTableOrder($tableID){
        $orders = Order::where('tabel_id', $tableID)
            ->where(function ($query) {
            $query->where('status', 'pending')
                  ->orWhere('status', 'preparing')
                  ->orWhere('status', 'ready');
            })->get();
        if ($orders->isEmpty()) {
            return response()->json(['message' => 'No orders found for this table'], 404);
        }
        return response()->json($orders, 200);
    }

    public function changeOrderStatus($status,Order $order)
    {
        if (!in_array($status, ['pending', 'preparing', 'ready', 'delivered','expired'])) {
            return response()->json(['error' => 'Invalid status'], 400);
        }
        $order->status = $status;
        $order->save();

        return response()->json(['message' => 'Order status updated successfully']);
    }
}
