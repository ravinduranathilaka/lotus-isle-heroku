@extends('layouts.app')

@section('content')
<div class="w-screen mx-auto p-4">
    <h1 class="text-2xl font-semibold mb-4">Available Packages</h1>

    <!-- Search -->
    <form method="GET" action="{{ route('customer.packages.index') }}" class="mb-4">
        <input type="text" name="search" placeholder="Search packages..." value="{{ request('search') }}" class="border rounded p-2 w-1/2" />
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded ml-2">Search</button>
    </form>

    <!-- Sort Dropdown -->
    <div class="mb-4">
        <label for="sort" class="mr-2">Sort by:</label>
        <select id="sort" class="border rounded p-1" onchange="sortTable(this.value)">
            <option value="name">Name</option>
            <option value="price">Price</option>
            <option value="category">Category</option>
        </select>
    </div>

    <!-- Packages Table -->
    <div class="overflow-x-auto">
        <table id="packagesTable" class="min-w-full bg-white border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2 border">Name</th>
                    <th class="px-4 py-2 border">Description</th>
                    <th class="px-4 py-2 border">Price</th>
                    <th class="px-4 py-2 border">Category</th>
                    <th class="px-4 py-2 border">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($packages as $package)
                    <tr>
                        <td class="border px-4 py-2">{{ $package->name }}</td>
                        <td class="border px-4 py-2">{{ $package->description }}</td>
                        <td class="border px-4 py-2">${{ number_format($package->price, 2) }}</td>
                        <td class="border px-4 py-2">{{ $package->category->name ?? 'N/A' }}</td>
                        <td class="border px-4 py-2 text-center">
                            <button onclick="openOrderModal({{ $package->id }}, '{{ $package->name }}')" class="bg-green-600 hover:bg-green-700 text-white font-bold px-4 py-2 rounded shadow">
                                Order
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Order Modal -->
    <div id="orderModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md relative">
            <button onclick="closeOrderModal()" class="absolute top-2 right-2 text-red-600 font-bold text-2xl">&times;</button>
            <h2 class="text-xl font-bold mb-4">Order: <span id="modalPackageName"></span></h2>

            <form method="POST" action="{{ route('customer.orders.store') }}">
                @csrf
                <input type="hidden" name="package_id" id="modalPackageId">

                <div class="mb-4">
                    <label for="start_date" class="block font-medium">Start Date</label>
                    <input type="date" name="start_date" required class="border rounded w-full px-3 py-2 mt-1">
                </div>

                <div class="mb-4">
                    <label for="people" class="block font-medium">Number of People</label>
                    <input type="number" name="people" min="1" value="1" class="border rounded w-full px-3 py-2 mt-1">
                </div>

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded">
                    Confirm Order
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Sort Function Script -->
<script>
    function sortTable(column) {
        const table = document.getElementById('packagesTable');
        const rows = Array.from(table.rows).slice(1);
        const colIndex = { name: 0, price: 2, category: 3 }[column];

        rows.sort((a, b) => {
            let valA = a.cells[colIndex].innerText.toLowerCase();
            let valB = b.cells[colIndex].innerText.toLowerCase();
            return valA.localeCompare(valB);
        });

        const tbody = table.querySelector('tbody');
        tbody.innerHTML = '';
        rows.forEach(row => tbody.appendChild(row));
    }

    function openOrderModal(packageId, packageName) {
        document.getElementById('modalPackageId').value = packageId;
        document.getElementById('modalPackageName').textContent = packageName;
        document.getElementById('orderModal').classList.remove('hidden');
        document.getElementById('orderModal').classList.add('flex');
    }

    function closeOrderModal() {
        document.getElementById('orderModal').classList.remove('flex');
        document.getElementById('orderModal').classList.add('hidden');
    }
</script>
@endsection
