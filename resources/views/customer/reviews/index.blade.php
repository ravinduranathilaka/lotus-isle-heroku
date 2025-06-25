<!-- <x-app-layout>
    <x-slot name="header">Write a Review</x-slot>

    <div class="max-w-2xl mx-auto p-4">
        <form method="POST" action="{{ route('customer.reviews.store') }}">
            @csrf
            <select name="package_id" required class="input">
                @foreach ($packages as $package)
                    <option value="{{ $package->id }}">{{ $package->name }}</option>
                @endforeach
            </select>
            <textarea name="content" class="input mt-2" placeholder="Write your review..." rows="4"></textarea>
            <button type="submit" class="btn mt-2">Submit Review</button>
        </form>
    </div>
</x-app-layout> -->
