<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Strive Interview</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('/css/bootstrap5.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/main.css') }}" rel="stylesheet">
        
    </head>
    <body class="antialiased">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">STRIVE</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            </div>
          </nav>
        @yield('content')

        <footer class="footr">Copyright</footer>
        <script src="{{ asset('/js/bootstrap5.js') }}"></script>
    </body>
</html>