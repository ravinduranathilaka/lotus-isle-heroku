<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if(Auth::user()->role === 'admin')
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">Admin Panel</h3>
                    <ul class="list-disc pl-5 space-y-2">
                        <li><a href="{{ route('admin.packages.index') }}" class="text-blue-500 hover:underline">Manage Packages</a></li>
                        <li><a href="{{ route('admin.categories.index') }}" class="text-blue-500 hover:underline">Manage Categories</a></li>
                        <li><a href="{{ route('admin.orders') }}" class="text-blue-500 hover:underline">Manage Orders</a></li>
                        
                    </ul>
                </div>
            @else
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">Customer Panel</h3>
                    <ul class="list-disc pl-5 space-y-2">
                        <li><a href="{{ route('customer.packages.index') }}" class="text-blue-500 hover:underline">View Tourism Packages</a></li>
                        <li><a href="{{ route('customer.orders.index') }}" class="text-blue-500 hover:underline">View My Orders</a></li>
                        
                    </ul>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>