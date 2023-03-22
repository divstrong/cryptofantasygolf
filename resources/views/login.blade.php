<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Player Login | CryptoFantasyGOLF</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

        <link href="{{ url('/css/app.css') }}" rel="stylesheet" />
    </head>
    <body class="text-center">
        <div class="container" id="lander">
        <img src="{{ url('/img/logo-full-white.png') }}" alt="CryptoFantasyGolf Logo" class="img-fluid m-5" />

            <main class="form-signin" id="lander">
                <h3 class="mb-4 yella">Player Entrance</h3>
                <form>           
                    @csrf     
                    <div class="form-floating mb-4">
                        <input type="email" class="form-control" name="email" id="email" placeholder="your@email
                        .com">
                        <label for="floatingInput">Email</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" name="password" id="password" placeholder="********">
                        <label for="floatingInput">Password</label>
                    </div>                    
                    <!-- <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div> -->
                
                    <!-- <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div> -->
                    <button class="w-100 btn btn-lg btn-warning" type="submit">Login</button>
                </form>
            </main>

            <div class="row" id="footer"> 
                <div class="col-md-12">
                    <a href="#" class="p-2">Terms</a> | <a href="#" class="p-2">Privacy</a> | <a href="#" class="p-2">Contact</a>
                </div>                  
            </div>            

        </div>            
    
      </body>
          <script type="text/javascript">
            // Masters
            var countDownDate = new Date("Apr 3, 2023 00:00:00").getTime();

            // Update the count down every 1 second
            var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById("countdown").innerHTML = days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";

            // If the count down is finished, write some text
            if (distance < 0) {
            clearInterval(x);
            document.getElementById("countdown").innerHTML = "EXPIRED";
            }
            }, 1000);            
        </script>    
</html>
