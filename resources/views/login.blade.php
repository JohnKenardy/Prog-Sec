<?php
//include("scripts/sessioncheck.php");
    //if($loggedin == 1){
        //header("location: index.php");
        //exit;
    //}

?>
<!DOCTYPE html>
<html>
<head>
    <title>RFID Tool - Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/w3.css')}}">
    <link rel="stylesheet" href="{{asset('css/raleway-font.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">


    <style>
        html, body{
            background-color: #504e4e;
            height: 100%;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }
        .logo {
            text-align: center;
            margin-top: 30px;
            margin-bottom: 20px;
        }
        .logo img {
            width: 200px;
        }
        html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}

    </style>
</head>


    <body class="w3-main">
        <!-- !PAGE CONTENT! -->
        <div class="container">
            <div class="w3-panel" style="width: 400px;">
                <div class="w3-container w3-card-4 w3-light-grey" style="max-width: 400px; margin: 0 auto; margin-top: 50px;">
                    <div class="logo">
                        <img src="{{asset('images/logo.png')}}" alt="Logo">
                    </div>
                    <form class="w3-container" style="padding: 20px;" action="{{route('loginUser')}}" method="post" autocomplete="off">
                        @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
                        @if(Session::has('fail'))
                            <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif
                        @csrf
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input class="w3-input form-control" type="text" id="email" name="email" required value="{{old('email')}}">
                            <span class="text-danger">@error('email'){{$message}}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input class="w3-input form-control" type="password" id="password" name="password" required>
                            <span class="text-danger">@error('password'){{$message}}@enderror</span>
                        </div>
                        <div class="form-group">
                            <button class="w3-button w3-blue w3-margin-top" type="submit">Login</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </body>
</html>
