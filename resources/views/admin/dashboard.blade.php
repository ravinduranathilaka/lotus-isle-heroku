{{-- resources/views/admin/dashboard.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Admin Dashboard</h1>

        <ul class="list-disc ml-5 space-y-2">
            <li><a href="{{ route('admin.packages.index') }}" class="text-blue-500 hover:underline">Manage Packages</a></li>
            <li><a href="{{ route('admin.categories.index') }}" class="text-blue-500 hover:underline">Manage Categories</a></li>
            <li><a href="{{ route('admin.orders') }}" class="text-blue-500 hover:underline">Manage Orders</a></li>
        </ul>
    </div>
@endsection