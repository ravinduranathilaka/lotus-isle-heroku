@extends('components.layout')

@section('content')
    <h1>Welcome, {{ auth()->user()->name }}</h1>
    <ul>
        <li><a href="{{ route('user.packages') }}">Browse Packages</a></li>
        <li><a href="{{ route('orders.index') }}">My Orders</a></li>
        <li><a href="{{ route('orders.history') }}">Order History</a></li>
    </ul>
@endsection