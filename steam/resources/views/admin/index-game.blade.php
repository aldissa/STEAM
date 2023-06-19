@extends('Template.html')

@section('title', 'Dashboard')

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
                            <br>
                            <a href="{{ route('game.edit', $game->id) }}" class="btn btn-secondary">Edit</a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $game->id }}">Delete</button>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="deleteModal{{ $game->id }}" tabindex="-1"
                    aria-labelledby="deleteModalLabel{{ $game->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel{{ $game->id }}">Confirm Delete</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this game?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{ route('game.destroy', ['id' => $game->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="deleteGame({{ $game->id }})">Sure</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection


<script>
    function deleteGame(gameId) {
        $('#deleteModal' + gameId).modal('hide');
    }
</script>
