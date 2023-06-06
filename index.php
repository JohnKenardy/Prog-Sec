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
        <title>Viden LIMS - Page Name</title>
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
                <p>INDEX PAGE LAYOUT TO BE CONFIRMED</p>
                <p>ICONS TO BE CONFIRMED</p>
            </div>
        </div>

        <?php
            include("layout/footer.php");
        ?>

        </body>
</html>
