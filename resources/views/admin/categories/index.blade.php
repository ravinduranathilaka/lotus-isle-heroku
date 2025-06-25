<x-app-layout>
    <x-slot name="header">Manage Categories</x-slot>

    <div class="max-w-7xl mx-auto p-4">
        <form method="POST" action="{{ route('admin.categories.store') }}">
            @csrf
            <input type="text" name="name" placeholder="Category Name" required class="input" />
            <input type="text" name="description" placeholder="Category Desctiption" required class="input" />
            <button type="submit" class="btn">Add Category</button>
        </form>

        <table class="table-auto w-full mt-6">
            <thead><tr><th>Name</th><th>Description</th><th>Action</th></tr></thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.categories.destroy', $category->id) }}">
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
