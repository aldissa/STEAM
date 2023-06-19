@extends('Template.html')

@section('title', 'Edit Game')

@section('body')

    @include('Template.nav')
    <div class="container mt-5">
        @if (session('message'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Game</h5>

                <form action="{{ route('game.update', ['id' => $game->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Game Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $game->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" required>{{ $game->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{ $game->price }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label">Photo</label>
                        <input type="file" class="form-control" id="foto" name="foto">
                    </div>

                    <label for="kategori_id">Category</label>
                    <select name="kategori_id" id="kategori_id" required>
                        <option value="">Choice Category</option>
                        @foreach ($kategories as $kategori)
                            <option value="{{ $kategori->id }}" @if ($kategori->id == $game->kategori_id) selected @endif>{{ $kategori->name }}</option>
                        @endforeach
                    </select>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection
