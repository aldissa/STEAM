@extends('Template.html')

@section('title', 'Homepage')

@section('body')

    @include('Template.nav')
    <img src="img/steam.png" class="" alt="banner" style="width: 100%; height: auto;">
    <div class="container mt-5">
        @if (session('message'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
        @endif
            
        <h2 class="text-light">New & Trending</h2>
        <div class="row">
            @foreach ($games as $game)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="img/{{ $game->foto }}" class="card-img-top" alt="{{ $game->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $game->name }}</h5>
                            <b class="card-text">Price: {{ $game->price }}</b> <br>
                            <a href="{{ route('game.show', $game->id) }}" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    

@endsection
