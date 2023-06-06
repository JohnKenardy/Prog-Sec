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
        <title>Viden LIMS - View Customers</title>
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
            <h1>View Customers</h1>
            <a href="add_customer.php" class="w3-button w3-padding w3-blue">Create New Customer</a>            
            
            <form method="GET" action="view_customers.php" <?php if (isset($_GET['customer'])) echo 'style="display: none;"'; ?>>
                <input type="text" name="search" placeholder="Search by name" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                <input type="submit" value="Search" class="w3-button w3-padding">

                <?php if (isset($_GET['search'])): ?>
                    <a href="view_customers.php" class="w3-button w3-padding w3-blue">View All</a>
                <?php endif; ?>
            </form>

            <?php
            // Check if a search query is provided
            if (isset($_GET['search'])) {
                $search = $_GET['search'];

                // Query to fetch matching customers
                $sql = "SELECT * FROM Customers WHERE customerName LIKE '%$search%';";

                require_once "scripts/config.php";

                $result = $link->query($sql);

                if ($result->num_rows > 0) {
                    // Display matching customers
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='w3-card-4 w3-margin w3-white'>";
                        echo "<div class='w3-container'>";
                        echo "<h3><b>" . $row["customerName"] . "</b></h3>";

                        echo "<div class='w3-row'>";
                        echo "<div class='w3-col m8 s12'>";
                        echo "<p><a href='view_customers.php?customer=" . $row["customerID"] . "'><button class='w3-button w3-padding-large w3-white w3-border'><b>View Customer Details</b></button></a></p>";
                        echo "</div>";
                        echo "<div class='w3-col m4 w3-hide-small'>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<h3>No matching customers found.</h3>";
                }
            } 
            elseif(isset($_GET['customer'])){
                echo('<a href="view_customers.php" class="w3-button w3-blue">Back to All Customers</a>');

                echo('<h1>Customer ID: ' .  $_GET['customer'] . '</h1>');

                $sql = "SELECT * 
                        FROM Customers
                        WHERE customerID = " . $_GET['customer'] . "
                        ;";
                
                require_once "scripts/config.php";

                $result = $link->query($sql);

                if ($result->num_rows < 0) {
                    echo('CUSTOMER ID DOES NOT EXIST');
                }else{
                    while($row = $result->fetch_assoc()) {
                        echo "<h5><b>Customer Name: </b>" . $row["customerName"] . "</h5>";
                        echo "<h5><b>Companyid: </b>" . $row["companyID"] . "</h5>";
                        echo "<h5><b>Role: </b>" . $row["role"] . "</h5>";
                        echo "<h5><b>Company ID: </b>" . @$row["userID"] . "</h5>";
                    }
                    echo('<a href="edit_customer.php?customerID=' . $_GET['customer'] . '" class="w3-button w3-blue">Edit</a>');

                }
            }else {
                // Display all customers
                $sql = "SELECT * FROM Customers;";

                require_once "scripts/config.php";

                $result = $link->query($sql);

                if ($result->num_rows > 0) {
                    // Display all customers
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='w3-card-4 w3-margin w3-white'>";
                        echo "<div class='w3-container'>";
                        echo "<h3><b>" . $row["customerName"] . "</b></h3>";

                        echo "<div class='w3-row'>";
                        echo "<div class='w3-col m8 s12'>";
                        echo "<p><a href='view_customers.php?customer=" . $row["customerID"] . "'><button class='w3-button w3-padding-large w3-white w3-border'><b>View Customer Details</b></button></a></p>";
                        echo "</div>";
                        echo "<div class='w3-col m4 w3-hide-small'>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<h3>No Items in the Database</h3>";
                }
            }
            $link->close();
            ?>

            </div>
           
        </div>

        <?php
            include("layout/footer.php");
        ?>

        </body>
</html>
