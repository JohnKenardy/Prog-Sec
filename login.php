<?php
include("scripts/sessioncheck.php");
    if($loggedin == 1){
        header("location: index.php");
        exit;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Viden LIMS - Login</title>
        <?php
            include("layout/style.php");
        ?>
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
            
        </style>
    </head>


    <body class="w3-main">
        <!-- !PAGE CONTENT! -->
        <div class="container">
            <div class="w3-panel" style="width: 400px;">
                <div class="w3-container w3-card-4 w3-light-grey" style="max-width: 400px; margin: 0 auto; margin-top: 50px;">
                    <div class="logo">
                        <img src="images/logo.png" alt="Logo">
                    </div>
                    <form class="w3-container" style="padding: 20px;" action="form_handlers/login_submit.php" method="post" autocomplete="off">
                        <label for="username">Username:</label>
                        <input class="w3-input" type="text" id="username" name="username" required>
                        
                        <label for="password">Password:</label>
                        <input class="w3-input" type="password" id="password" name="password" required>
                        
                        <button class="w3-button w3-blue w3-margin-top" type="submit">Login</button>

                        <p><span id="Error" style="color: red" style="margin-bottom: 20px;"></span></p>
                    </form>

                    <script>
                        var ErrorMessage = "";

                            <?php
                            if(isset($_GET["e"])){
                                $e=$_GET["e"];
                            }
                            if(isset($e)){
                                if($e == 1){
                                    echo('ErrorMessage += "<strong>Invalid Username/Password</strong>"');
                                }
                            }
                            ?>
                            
                        document.getElementById("Error").innerHTML = ErrorMessage;
                    </script>
                </div>
            </div>
        </div>
    </body>
</html>
