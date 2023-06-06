<?php
include("scripts/sessioncheck.php");
    if($loggedin == 0){
        header("location: login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>RFID Tool - Page Name</title>
        <?php
            include("layout/style.php");
        ?>
    </head>


    <body class="w3-light-grey">

        <?php
            include("layout/sidebar.php");
        ?>

        <!-- !PAGE CONTENT! -->
        <div class="w3-main" style="margin-left:250px;margin-top:43px;">
            <div class="w3-panel">
                <h1>Programming for Security</h1>
                <img src="images/logo.png" alt="Logo">
            </div>
        </div>

        <?php
            include("layout/footer.php");
        ?>

        </body>
</html>
