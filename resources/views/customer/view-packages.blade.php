@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-4">
    <h1 class="text-2xl font-semibold mb-4">Available Packages</h1>

    <div class="mb-4">
        <label for="sort" class="mr-2">Sort by:</label>
        <select id="sort" class="border rounded p-1" onchange="sortTable(this.value)">
            <option value="name">Name</option>
            <option value="price">Price</option>
            <option value="category">Category</option>
        </select>
    </div>

    <table id="packagesTable" class="min-w-full bg-white border">
        <thead>
            <tr>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Description</th>
                <th class="px-4 py-2">Price</th>
                <th class="px-4 py-2">Category</th>
                <th class="px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($packages as $package)
                <tr>
                    <td class="border px-4 py-2">{{ $package->name }}</td>
                    <td class="border px-4 py-2">{{ $package->description }}</td>
                    <td class="border px-4 py-2">${{ $package->price }}</td>
                    <td class="border px-4 py-2">{{ $package->category->name }}</td>
                    <td class="border px-4 py-2">
                        <form action="{{ route('customer.orders.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="package_id" value="{{ $package->id }}">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white px-3 py-1 rounded">Order</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

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
</script>
@endsection