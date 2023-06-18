@extends('Template.html')

@section('title', 'Homepage')

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
                <h5 class="card-title">Add Game</h5>

                <form action="{{ route('add-game') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Game Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea type="text" class="form-control" id="description" name="description" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price" required>
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label">Photo</label>
                        <input type="file" class="form-control" id="foto" name="foto" required>
                    </div>

                    <label for="kategori_id">Category</label>
                    <select name="kategori_id" id="kategori_id" required>
                        <option value="">Choice Category</option>
                        @foreach ($kategories as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                        @endforeach
                    </select>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection
