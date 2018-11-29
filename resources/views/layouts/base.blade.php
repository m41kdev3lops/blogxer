<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aqar Blog | @yield('title', 'Home')</title>

    {{-- Font Awesome --}}
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


    {{-- Bootstrap CDN --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">


    @yield('head')
</head>
<body>
    
    @include('inc.nav_bar')

    <div class="container">
        <br>
        @include('inc.errors')

        <div class="row">
            <div class="col-md-12">
                @yield('content')
            </div>
        </div>
    </div>

    @yield('scripts')
    {{-- jQuery CDN --}}
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    
    {{-- Bootstrap JS --}}
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    {{-- SWAL --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @if ( session()->has('message') )
        <script>
			swal(
				"{{ session('title') ?? 'Success' }}",
				"{{ session('message') }}",
				"{{ session('message-class') ?? 'success' }}"
			);
		</script>
    @endif
</body>
</html>
