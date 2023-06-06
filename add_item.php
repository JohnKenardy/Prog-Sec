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
        <title>RFID Tool - Create New Item</title>
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
                <div class="w3-container w3-card-4 w3-light-grey" style="max-width: 400px; margin: 0 auto; margin-top: 50px;">
                    <form class="w3-container" style="padding: 20px;" action="form_handlers/add/add_item_submit.php" method="post" autocomplete="off">
                        <h2>Create New Item:</h2>
                        <a href="view_items.php" class="w3-button w3-blue">Back to All Items</a>
                        <br><br>


                        <label for="itemName">item Name:</label>
                            <input type="text" id="itemName" name="itemName" required>
                        <br><br>

                        
                        <label for="itemRFID">RFID code:</label>
                            <input type="text" id="itemRFID" name="itemRFID" required>
                        <br><br>
                        
                        <input type="submit" value="Submit" class="w3-button w3-blue">

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
                                    echo('ErrorMessage += "<strong>Missing Data</strong>"');
                                }
                            }
                            ?>
                            
                        document.getElementById("Error").innerHTML = ErrorMessage;
                    </script>
                </div>
            </div>
        </div>

        <?php
            include("layout/footer.php");
        ?>

        </body>
</html>
