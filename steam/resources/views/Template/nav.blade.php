<link rel="stylesheet" href="../../css/bootstrap.min.css">

<nav class="navbar navbar-expand-lg" style="background-color: #0a152f">
    <a class="navbar-brand" href="/">STEAM</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        @auth
            @if (auth()->user()->role === 'admin')
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" style="color: #97a3bf" href="{{ route('loginform') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="nav-link" style="border: none; background-color: transparent; padding: 0; margin: 0; cursor: pointer; outline: none; margin-top: 8px; color: #97a3bf;">Logout</button>
                        </form>
                    </li>
                </ul>
            @else
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" style="color: #97a3bf" href="{{ route('welcome') }}">Store</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" style="color: #97a3bf" href="{{ route('koleksi') }}">Library</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" style="color: #97a3bf" href="{{ route('loginform') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="nav-link" style="border: none; background-color: transparent; padding: 0; margin: 0; cursor: pointer; outline: none; margin-top: 8px; color: #97a3bf;">Logout</button>
                        </form>
                    </li>
                </ul>
            @endif
        @else
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" style="color: #97a3bf" href="{{ route('welcome') }}">Store</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" style="color: #97a3bf" href="{{ route('loginform') }}">Login</a>
                </li>
            </ul>
        @endauth
    </div>
</nav>
