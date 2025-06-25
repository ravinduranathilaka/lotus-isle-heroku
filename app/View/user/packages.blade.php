@extends('components.layout')

@section('content')
    <h2>Available Packages</h2>
    @foreach($packages as $package)
        <div>
            <h3>{{ $package->name }}</h3>
            <p>{{ $package->description }}</p>
            <form action="{{ route('customer.orders.store') }}" method="POST">
                @csrf
                <input type="hidden" name="package_id" value="{{ $package->id }}">
                <input type="date" name="start_date" required>
                <input type="number" name="people_count" min="1" required>
                <button type="submit">Book</button>
            </form>
        </div>
    @endforeach
@endsection