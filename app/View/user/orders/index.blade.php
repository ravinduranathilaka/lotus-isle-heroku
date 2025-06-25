@extends('components.layout')

@section('content')
    <h2>Your Orders</h2>
    @foreach($orders as $order)
        <p>{{ $order->package->name }} | {{ $order->start_date }} | {{ $order->status }}</p>
    @endforeach
@endsection