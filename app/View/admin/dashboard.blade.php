@extends('components.layout')

@section('content')
    <h1>Admin Dashboard</h1>
    <ul>
        <li><a href="{{ route('categories.index') }}">Manage Categories</a></li>
        <li><a href="{{ route('packages.index') }}">Manage Packages</a></li>
        <li><a href="{{ route('admin.orders') }}">View Orders</a></li>
    </ul>
@endsection