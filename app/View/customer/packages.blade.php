<x-app-layout>
    <x-slot name="header">Tourism Packages</x-slot>

    <div class="max-w-7xl mx-auto p-4">

        <!-- Search -->
        <form method="GET" action="{{ route('customer.packages.index') }}" class="mb-4">
            <input type="text" name="search" placeholder="Search packages..." value="{{ request('search') }}" class="border rounded p-2 w-1/2" />
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Search</button>
        </form>

        <!-- Packages Table -->
        <table class="w-full table-auto border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">Name</th>
                    <th class="border px-4 py-2">Description</th>
                    <th class="border px-4 py-2">Category</th>
                    <th class="border px-4 py-2">Price</th>
                    <th class="border px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($packages as $package)
                    <tr>
                        <td class="border px-4 py-2">{{ $package->name }}</td>
                        <td class="border px-4 py-2">{{ $package->description }}</td>
                        <td class="border px-4 py-2">{{ $package->category->name ?? 'N/A' }}</td>
                        <td class="border px-4 py-2">${{ number_format($package->price, 2) }}</td>
                        <td class="border px-4 py-2 text-center">
                            <button onclick="openOrderModal({{ $package->id }}, '{{ $package->name }}')" class="bg-green-500 text-white px-3 py-1 rounded">Order</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Order Modal -->
        <div id="orderModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
            <div class="bg-white rounded shadow p-6 w-full max-w-md relative">
                <button onclick="closeOrderModal()" class="absolute top-2 right-2 text-red-600 font-bold">&times;</button>
                <h2 class="text-xl font-semibold mb-4">Order: <span id="modalPackageName"></span></h2>

                <form method="POST" action="{{ route('customer.orders.store') }}">
                    @csrf
                    <input type="hidden" name="package_id" id="modalPackageId" />

                    <label for="start_date" class="block mb-2">Start Date</label>
                    <input type="date" name="start_date" required class="border w-full mb-4 p-2 rounded" />

                    <!-- Optional: Add number of people -->
                    <label for="people" class="block mb-2">Number of People</label>
                    <input type="number" name="people" min="1" value="1" class="border w-full mb-4 p-2 rounded" />

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Confirm Order</button>
                </form>
            </div>
        </div>

        <!-- Modal JS -->
        <script>
            function openOrderModal(id, name) {
                document.getElementById('modalPackageId').value = id;
                document.getElementById('modalPackageName').textContent = name;
                document.getElementById('orderModal').classList.remove('hidden');
                document.getElementById('orderModal').classList.add('flex');
            }

            function closeOrderModal() {
                document.getElementById('orderModal').classList.remove('flex');
                document.getElementById('orderModal').classList.add('hidden');
            }
        </script>
    </div>
</x-app-layout>