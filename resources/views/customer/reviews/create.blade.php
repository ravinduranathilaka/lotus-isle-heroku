@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-4">
    <h1 class="text-2xl font-semibold mb-4">My Orders</h1>
    <table class="min-w-full bg-white border">
        <thead>
            <tr>
                <th class="px-4 py-2">Package</th>
                <th class="px-4 py-2">Ordered On</th>
                <th class="px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td class="border px-4 py-2">{{ $order->package->name }}</td>
                    <td class="border px-4 py-2">{{ $order->created_at->format('Y-m-d') }}</td>
                    <td class="border px-4 py-2">
                        <button class="bg-green-500 hover:bg-green-700 text-white px-3 py-1 rounded" onclick="openReviewModal({{ $order->id }}, '{{ $order->package->name }}')">Write Review</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Review Modal -->
<div id="reviewModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 hidden flex items-center justify-center">
    <div class="bg-white p-6 rounded shadow-lg w-1/3">
        <h2 class="text-xl font-bold mb-4">Write Review for <span id="packageName"></span></h2>
        <!-- <form id="reviewForm" method="POST" action="{{ route('customer.reviews.store') }}"> -->
            @csrf
            <input type="hidden" name="order_id" id="reviewOrderId">
            <textarea name="review" class="w-full border rounded p-2" rows="4" required></textarea>
            <div class="mt-4 text-right">
                <button type="button" onclick="closeReviewModal()" class="mr-2 text-gray-600">Cancel</button>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded">Submit</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openReviewModal(orderId, packageName) {
        document.getElementById('reviewOrderId').value = orderId;
        document.getElementById('packageName').textContent = packageName;
        document.getElementById('reviewModal').classList.remove('hidden');
    }

    function closeReviewModal() {
        document.getElementById('reviewModal').classList.add('hidden');
    }
</script>
@endsection
