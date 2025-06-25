@extends('components.layout')

@section('content')
    <h1>Tourism Packages</h1>
    @foreach ($packages as $package)
        <div>
            <h3>{{ $package->name }}</h3>
            <p>{{ $package->description }}</p>
            <p><strong>Location:</strong> {{ $package->location }}</p>
            <p><strong>Price:</strong> ${{ $package->price }}</p>
        </div>
    @endforeach
@endsection