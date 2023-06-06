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
        <title>Viden LIMS - Create New Customer</title>
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
                    <form class="w3-container" style="padding: 20px;" action="form_handlers/add/add_customer_submit.php" method="post" autocomplete="off">
                        <h2>Create New Customer:</h2>
                        <a href="view_customers.php" class="w3-button w3-blue">Back to All Customers</a>
                        <br><br>


                        <label for="customerName">Customer Name:</label>
                            <input type="text" id="customerName" name="customerName" required>
                        <br><br>

                        <label for="companyID">Company:</label>
                        <select id="companyID" name="companyID" required>
                            <?php
                            
                            // Query to fetch company data
                            $sql = "SELECT companyID, companyName FROM Companies";

                            require_once "scripts/config.php";
                            $result = $link->query($sql);

                            // Iterate over the result and generate option tags
                            while ($row = $result->fetch_assoc()) {
                                $companyID = $row['companyID'];
                                $companyName = $row['companyName'];
                                echo "<option value='$companyID'>$companyName</option>";
                            }
                            
                            ?>
                        </select>
                        <br><br>
                        
                        <label for="role">Role:</label>
                            <input type="text" id="role" name="role" required>
                        <br><br>

                        <label for="userID">User:</label>
                        <select id="userID" name="userID" required>
                            <?php
                            
                            // Query to fetch company data
                            $sql = "SELECT userID, name FROM Users WHERE userType = 'Customer'";

                            $result = $link->query($sql);

                            // Iterate over the result and generate option tags
                            while ($row = $result->fetch_assoc()) {
                                $userID = $row['userID'];
                                $name = $row['name'];
                                echo "<option value='$userID'>$name</option>";
                            }
                            
                            // Close the database connection
                            $link->close(); 
                            ?>
                        </select>
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
