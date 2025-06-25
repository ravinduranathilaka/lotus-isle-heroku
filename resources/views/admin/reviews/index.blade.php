<!-- <x-app-layout>
    <x-slot name="header">Manage Reviews</x-slot>

    <div class="max-w-7xl mx-auto p-4">
        <table class="table-auto w-full">
            <thead><tr><th>User</th><th>Package</th><th>Review</th><th>Action</th></tr></thead>
            <tbody>
                @foreach ($reviews as $review)
                    <tr>
                        <td>{{ $review->user->name }}</td>
                        <td>{{ $review->package->name }}</td>
                        <td>{{ $review->content }}</td>
                        <td>
                            <form method="POST" action="{{ route('reviews.destroy', $review->id) }}">
                                @csrf @method('DELETE')
                                <button class="btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout> -->
