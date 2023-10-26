<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function create()
    {
        return view('orders.create');
    }

    public function index()
    {
        $orders = Order::all();
        return view('orders.index', ['orders' => $orders]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        // Validate the order creation form data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Create a new order and associate it with the user
        $order = new Order([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        $user->orders()->save($order);

        return redirect()->route('user.show')->with('success', 'Order created successfully.');
    }

    public function show(Order $order)
    {
        return view('orders.show', ['order' => $order]);
    }

    public function accept(Order $order)
    {

        $user = Auth::user();

        if ($order->status === 'pending') {
            $order->status = 'accepted';
            $order->accepted_by = $user->id;
            $order->accepted_at = now()->setTimezone($user->timezone);

            // Calculate the deadline based on the accepted date and delivery time (e.g., 5 days)
            $order->deadline_at = $order->accepted_at->addDays(5);

            $order->save();
        }

        return redirect()->route('orders.index')->with('success', 'Order accepted successfully.');
    }
}
