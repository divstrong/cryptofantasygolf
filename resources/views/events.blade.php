<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CryptoFantasy Golf: Masters Beta 2023</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

        <link href="{{ url('/css/app.css') }}" rel="stylesheet" />
    </head>
    <body class="text-center">
        <div class="container" id="events">
        <img src="{{ url('/img/logo-full-white.png') }}" alt="CryptoFantasyGolf Logo" class="img-fluid m-5 logo" />
            <main class="form-signin" id="lander">
                <h1>Events</h1>
                <div class="row text-center">
                 @if(@$events) 
                    @foreach (@$events as $e) 
                        <div class="col-md-4">
                            <div class="card">
                                <a href="#">
                                    <img src="{{ url('img/'.$e->image) }}" class="img-fluid m-4" />
                                    <span class="m-4">{{ $e->title }}</span>
                                </a>
                            </div>                                
                        </div>
                    @endforeach
                @endif
                </div>
            </main>

        </div>            
      </body>
</html>
