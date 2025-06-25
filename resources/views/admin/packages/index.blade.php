<x-app-layout>
    <x-slot name="header">Manage Packages</x-slot>

    <div class="max-w-7xl mx-auto p-4">
        <form method="POST" action="{{ route('admin.packages.store') }}">
            @csrf
            <input type="text" name="name" placeholder="Package Name" required class="input" />
            <input type="text" name="description" placeholder="Description" required class="input" />
            <input type="text" name="location" placeholder="Location" required class="input" />
            <input type="number" name="duration_days" placeholder="Duration (in days)" required class="input" />
            <input type="number" name="price" placeholder="Price" required class="input" />
            <select name="category_id" class="input">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn">Add Package</button>
        </form>

        <table class="table-auto w-full mt-6">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Location</th>
            <th>Duration (days)</th>
            <th>Category</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($packages as $package)
            <tr>
                <td>{{ $package->name }}</td>
                <td>{{ $package->description }}</td>
                <td>{{ $package->price }}</td>
                <td>{{ $package->location }}</td>
                <td>{{ $package->duration_days }}</td>
                <td>{{ $package->category->name ?? 'N/A' }}</td>
                <td>
                    <form method="POST" action="{{ route('admin.packages.destroy', $package->id) }}">
                        @csrf @method('DELETE')
                        <button class="btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
    </div>
</x-app-layout>
