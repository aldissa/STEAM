@extends('Template.html')

@section('title', 'Koleksi Game')

@section('body')

    @include('Template.nav')

    <div class="container mt-5">
        <h1 class="text-light">Libray</h1>
        <div class="row">
            @if ($transaksis->count() > 0)
                @foreach ($transaksis as $transaksi)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="/img/{{ $transaksi->game->foto }}" class="card-img-top" alt="{{ $transaksi->game->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $transaksi->game->name }}</h5>
                                <p class="card-text">{{ $transaksi->game->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-12">
                    <p class="text-light">There are no games in the libray yet.</p>
                </div>
            @endif
        </div>
    </div>

@endsection
