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
        <title>RFID Tool - Edit Item</title>
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
                    <form class="w3-container" style="padding: 20px;" action="form_handlers/edit/edit_item_submit.php" method="post" autocomplete="off">
                        <h2>Edit Item:</h2>


                        <?php 
                                if(isset($_GET['itemID'])){
                                    echo('<a href="view_items.php" class="w3-button w3-blue">Back to All Items</a>');

                                    echo('<h1>Item ID: ' .  $_GET['itemID'] . '</h1>');

                                    $sql = "SELECT * 
                                            FROM Items
                                            WHERE itemID = " . $_GET['itemID'] . "
                                            ;";
                                    
                                    require_once "scripts/config.php";

                                    $result = $link->query($sql);

                                    if ($result->num_rows < 0) {
                                        echo('Item ID DOES NOT EXIST');
                                    }else{
                                        while($row = $result->fetch_assoc()) {
                                            $itemID = $row["itemID"];
                                            $itemName = $row["itemName"];
                                            $itemRFID = $row["itemRFID"];
                                            
                                        }
                                    }
                                
                                    } else {
                                        echo "<h3>No Items in the Database</h3>";
                                    }

                            ?>
                        <input type="hidden" name="itemID" value="<?php echo($itemID); ?>">


                        <label for="itemName">item Name:</label>
                            <input type="text" id="itemName" name="itemName" required value="<?php echo($itemName) ?>">
                        <br><br>

                        
                        <label for="itemRFID">RFID code:</label>
                            <input type="text" id="itemRFID" name="itemRFID" required value="<?php echo($itemRFID) ?>">
                        <br><br>
                        
                        <input type="submit" value="Change" class="w3-button w3-blue">

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
