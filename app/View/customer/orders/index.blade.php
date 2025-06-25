<x-app-layout>
    <x-slot name="header">My Orders</x-slot>

    <div class="max-w-7xl mx-auto p-4">
        <table class="table-auto w-full">
            <thead><tr><th>Package</th><th>Ordered On</th></tr></thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->package->name }}</td>
                        <td>{{ $order->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
