@extends('Template.html')

@section('title', 'Game Detail')

@section('body')

    @include('Template.nav')
    <div class="container mt-5">
        <div class="card">
            <img src="/img/{{ $game->foto }}" class="card-img-top" alt="{{ $game->name }}">
            <div class="card-body">
                <h5 class="card-title">{{ $game->name }}</h5>
                <p class="card-text">{{ $game->description }}</p>
                <b class="card-text">Price: {{ $game->price }}</b>
                <form id="buyForm" action="{{ route('processBuy', ['game_id' => $game->id]) }}" method="POST">
                    @csrf
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Buy
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Confirm Buying</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary" onclick="submitForm()">Sure</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        function submitForm() {
            document.getElementById('buyForm').submit();
        }
    </script>

@endsection
