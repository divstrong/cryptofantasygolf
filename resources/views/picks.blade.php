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
            <main class="form-signin" id="picks">
                <h1 class="mb-5">Pick <span id="count"></span> Golfers</h1>
                <div class="row text-center players">
                 @if(@$golfers) 
                    @foreach (@$golfers as $g) 
                        <div class="col-md-12 mb-4">
                            <a href="#" data-golferID="{{ $g->id }}" class="pick">
                                <div class="card">
                                    <h3 class="m-4">{{ $g->name }}</h3>
                                </div>      
                            </a>                          
                        </div>
                    @endforeach
                @endif
                </div>
            </main>

        </div>         
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>        
        <script>
            
            // // Set Picks 
            // if (localStorage.getItem("picks")) let picks = localStorage.getItem("picks")
            // else {
            //     let picks = [];
            //     localStorage.setItem("picks", picks);
            // }

            // let count = (5 - picks.length);
            // $('#count').text(count);

            // // Listen for picks
            // // $('.pick').click(addPick($(this).data("golferID")));
            // $('.pick').click(alert('farts'));

            // function addPick(gid) {
            //     let picks = localStorage.getItem("picks");
            //     picks.push(gid);
            //     localStorage.setItem("picks", picks);
            //     let count = (5 - picks.length);
            //     $('#count').text(count);
            // }
        </script>
      </body>
</html>
