<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller {
        public function index()
    {
        $orders = auth()->user()->orders()->with('package')->latest()->get();
        return view('customer.orders.index', compact('orders'));
    }

    public function history()
    {
        $orders = auth()->user()->orders()->with('package')->get();
        return view('customer.orders.history', compact('orders'));
    }

    public function adminIndex()
    {
        $orders = Order::with('user', 'package')->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return back()->with('success', 'Order deleted.');
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        $order->status = $request->input('status');
        $order->save();

        return redirect()->back()->with('success', 'Order status updated.');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'package_id' => 'required|exists:packages,id',
        'start_date' => 'required|date|after_or_equal:today',
        'people' => 'required|integer|min:1',
    ]);

    \App\Models\Order::create([
        'user_id' => auth()->id(),
        'package_id' => $validated['package_id'],
        'start_date' => $validated['start_date'],
        'people_count' => $validated['people'],
    ]);

    return redirect()->route('customer.orders.index')->with('success', 'Order placed successfully.');
}
}