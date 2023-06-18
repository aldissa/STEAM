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
            
        <a href="{{ route('showAddGame') }}" class="btn btn-primary">Add Game</a>

        <h2 class="text-light">List Game</h2>
        <div class="row">
            @foreach ($games as $game)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="img/{{ $game->foto }}" class="card-img-top" alt="{{ $game->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $game->name }}</h5>
                            <p class="card-text">{{ $game->description }}</p>
                            <b class="card-text">Price: {{ $game->price }}</b>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        b {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 10px;
            background-color: #f8f9fa;
            font-weight: bold;
        }
    </style>

@endsection
