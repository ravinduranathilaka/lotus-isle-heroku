<?php

// namespace App\Http\Controllers;
// use App\Models\Review;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class ReviewController extends Controller {
//     public function create()
// {
//     $orders = auth()->user()->orders()->with('package')->get();
//     return view('customer.reviews.create', compact('orders'));
// }

// public function store(Request $request)
// {
//     $request->validate([
//         'order_id' => 'required|exists:orders,id',
//         'rating' => 'required|integer|min:1|max:5',
//         'comment' => 'nullable|string|max:1000',
//     ]);

//     Review::create([
//         'order_id' => $request->order_id,
//         'rating' => $request->rating,
//         'comment' => $request->comment,
//     ]);

//     return redirect()->back()->with('success', 'Review submitted.');
// }

// public function adminIndex()
// {
//     $reviews = Review::with('order.user', 'order.package')->latest()->get();
//     return view('admin.reviews.index', compact('reviews'));
// }

// public function destroy($id)
// {
//     Review::destroy($id);
//     return back()->with('success', 'Review deleted.');
// }
// }