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
    <body>
        <div class="container m-5 text-center" id="lander">
            <div class="row">
                <div class="col-md-12 mb-5">
                    <img src="{{ url('/img/logo-full-white.png') }}" alt="CryptoFantasyGolf Logo" class="img-fluid" />
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-12">
                    <h1>Masters Beta 2023</h1>
                    <p class="mb-4">Add your email if you wants in mang...</p>
                    <form>
                        <div class="form-control mb-4">
                            <input type="text" name="email" placeholder="your@email.com" class="form-control" />
                        </div>
                        <div class="row">
                            <button class="btn btn-warning">Request Invite</button>
                        </div>                         
                    </form>
                </div>
            </div>            
            <div class="row m-2">
                <div class="col-md-12">
                    <h2 class="m-4">Contests open in <span id="countdown"></span></h2>
                </div>  
                <div class="col-md-12">
                    <a href="#" class="p-2">Rules</a> | <a href="#" class="p-2">Scoring</a> | <a href="#" class="p-2">Enter</a>
                </div>                  
            </div>
        </div>
    </body>
    <script type="text/javascript">
   
        </script>    
</html>
