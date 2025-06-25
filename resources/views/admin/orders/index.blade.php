<x-app-layout>
    <x-slot name="header">Manage Orders</x-slot>

    <div class="max-w-7xl mx-auto p-4">
        <table class="table-auto w-full">
            <thead><tr><th class="border px-4 py-2">User</th>
                        <th class="border px-4 py-2">Email</th>
                        <th class="border px-4 py-2">Package</th>
                        <th class="border px-4 py-2">Status</th>
                        <th class="border px-4 py-2">Date</th>
                        <th class="border px-4 py-2">Action</th>
                    </tr></thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td class="border px-4 py-2">{{ $order->user->name ?? 'Unknown User' }}</td>
                        <td class="border px-4 py-2">{{ $order->user->email ?? 'N/A' }}</td>
                        <td class="border px-4 py-2">{{ $order->package->name ?? 'Unknown Package' }}</td>
                        <td class="border px-4 py-2">
                            <form method="POST" action="{{ route('admin.orders.updateStatus', $order->id) }}">
                                @csrf
                                @method('PATCH')
                                <select name="status" onchange="this.form.submit()" class="px-2 py-1 rounded
                                    @if($order->status == 'pending') bg-yellow-200 text-yellow-800
                                    @elseif($order->status == 'confirmed') bg-green-200 text-green-800
                                    @elseif($order->status == 'cancelled') bg-red-200 text-red-800
                                    @endif">
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="confirmed" {{ $order->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </form>
                        </td>
                        <td class="border px-4 py-2">{{ $order->created_at->format('Y-m-d') }}</td>
                        <td class="border px-4 py-2">
                            <form method="POST" action="{{ route('admin.orders.destroy', $order->id) }}">
                                @csrf @method('DELETE')
                                <button class="bg-red-500 text-red px-3 py-1 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>