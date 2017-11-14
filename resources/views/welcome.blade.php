<!doctype html>

<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        <link rel="stylesheet" href="<?php echo asset('css/main.css');?>"  type="text/css">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <!-- @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif -->

            <div class="content">
                <div class="title m-b-md myColor">
                   Weather Forecast
                </div>

                <form class="title m-b-md myColor" name="weatherForm"  method="GET">
                   <h1> Your weather today </h1>
                   City: <input type="text" name="city" placeholder="city"/><br />
                   
                   <input type="submit" name="submit" value="Submit" />
                </form>
                <br />
                <br />
<?php
  if(isset($_GET['city']) ? $_GET['city'] : ''){
      $user_city = $_GET['city'];


      $api_url =   "http://api.openweathermap.org/data/2.5/weather?q=".$user_city."&appid=4f127a6589b5a52dadae0e50a75d03b6";
      $weather_data = file_get_contents($api_url);
      $json = jeson_decode($weather_data, TRUE);


      $user_temp =$json['main']['temp'];


      echo "<strong>City:</strong>".$user_city."<br />";
      echo "<strong>City tempreture:</strong>".$user_temp."<br />";
  };

?>

<?php 
   if(isset($_GET['submit'])){

    echo $user_temp;

     $data = "data.json";
     echo $data;
    $json_string =json_decode($_GET, JSON_PRETTY_PRINT);
    file_put_contents($data, $json_string, FIL_APPEND);
}
?>

                <!-- <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div> -->
            </div>
        </div>
    </body>
</html>
