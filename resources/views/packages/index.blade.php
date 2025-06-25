@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Available Tour Packages</h1>
        <ul>
            @foreach($packages as $package)
                <li>
                    <h3>{{ $package->name }}</h3>
                    <p>{{ $package->description }}</p>
                    <p><strong>Location:</strong> {{ $package->location }}</p>
                    <p><strong>Price:</strong> ${{ $package->price }}</p>
                </li>
            @endforeach
        </ul>
    </div>
@endsection