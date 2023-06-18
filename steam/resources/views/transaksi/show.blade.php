@extends('Template.html')

@section('title', 'Detail Transaksi')

@section('body')

    @include('Template.nav')

    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Detail Transaction</h5>
                <p><strong>Transaction ID:</strong> {{ $transaksi->id }}</p>
                <p><strong>User:</strong> {{ $transaksi->user->username }}</p>
                <p><strong>Game:</strong> {{ $transaksi->game->name }}</p>
                <p><strong>QTY:</strong> {{ $transaksi->qty }}</p>
                <p><strong>Total Price:</strong> {{ $transaksi->price }}</p>
            </div>
        </div>
    </div>

@endsection
