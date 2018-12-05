<nav class="navbar navbar-expand-lg navbar-light bg-light">
    
    <a class="navbar-brand" href="/">BlogXer</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Categories
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @foreach( $categories as $category )
                        <a class="dropdown-item" href="{{ $category->getLink() }}">{{ $category->name }}</a>
                    @endforeach
                </div>
            </li>

            @if( loggedIn() )
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('category/create') }}">Add Category</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('post/create') }}">Add Post</a>
                </li>
            @endif
        </ul>

        @if ( ! loggedIn() )
            <a href="{{ url('admin') }}" class="nav-link">Admin Login</a>
        @else
            <a href="{{ url('admin/profile') }}">Hello {{ admin()->name }}</a> &nbsp; ( <a href="{{ url('logout') }}" class="nav-link">Logout</a> )
        @endif
        
        {{-- search Form --}}
        {{-- Not sure if I'll use that. --}}
        {{-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> --}}
        {{-- /Search Form --}}
    </div>
</nav>
