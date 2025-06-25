{{-- resources/views/user/dashboard.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Customer Dashboard</h1>

        <ul class="list-disc ml-5 space-y-2">
            <li><a href="{{ route('packages.index') }}" class="text-blue-500 hover:underline">View Tourism Packages</a></li>
            <li><a href="{{ route('orders.index') }}" class="text-blue-500 hover:underline">View My Orders</a></li>
            <!-- <li><a href="{{ route('reviews.create') }}" class="text-blue-500 hover:underline">Create Review</a></li> -->
        </ul>
    </div>
@endsection