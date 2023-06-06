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
        <title>RFID Tool - View Items</title>
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
            <h1>View Items</h1>
            <a href="add_item.php" class="w3-button w3-padding w3-blue">Create New Item</a>            
            
            <form method="GET" action="view_items.php" <?php if (isset($_GET['item'])) echo 'style="display: none;"'; ?>>
                <input type="text" name="search" placeholder="Search by name" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                <input type="submit" value="Search" class="w3-button w3-padding">

                <?php if (isset($_GET['search'])): ?>
                    <a href="view_items.php" class="w3-button w3-padding w3-blue">View All</a>
                <?php endif; ?>
            </form>

            <?php
            // Check if a search query is provided
            if (isset($_GET['search'])) {
                $search = $_GET['item'];

                // Query to fetch matching item
                $sql = "SELECT * FROM Items WHERE itemName LIKE '%$search%';";

                require_once "scripts/config.php";

                $result = $link->query($sql);

                if ($result->num_rows > 0) {
                    // Display matching items
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='w3-card-4 w3-margin w3-white'>";
                        echo "<div class='w3-container'>";
                        echo "<h3><b>" . $row["itemName"] . "</b></h3>";

                        echo "<div class='w3-row'>";
                        echo "<div class='w3-col m8 s12'>";
                        echo "<p><a href='view_items.php?item=" . $row["itemID"] . "'><button class='w3-button w3-padding-large w3-white w3-border'><b>View Item Details</b></button></a></p>";
                        echo "</div>";
                        echo "<div class='w3-col m4 w3-hide-small'>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<h3>No matching items found.</h3>";
                }
            } 
            elseif(isset($_GET['item'])){
                echo('<a href="view_items.php" class="w3-button w3-blue">Back to All items</a>');

                echo('<h1>item ID: ' .  $_GET['item'] . '</h1>');

                $sql = "SELECT * 
                        FROM Items
                        WHERE itemID = " . $_GET['item'] . "
                        ;";
                
                require_once "scripts/config.php";

                $result = $link->query($sql);

                if ($result->num_rows < 0) {
                    echo('item ID DOES NOT EXIST');
                }else{
                    while($row = $result->fetch_assoc()) {
                        echo "<h5><b>Item Name: </b>" . $row["itemName"] . "</h5>";
                        echo "<h5><b>Companyid: </b>" . $row["itemRFID"] . "</h5>";
                    }
                    echo('<a href="edit_item.php?itemID=' . $_GET['item'] . '" class="w3-button w3-blue">Edit</a>');

                }
            }else {
                // Display all items
                $sql = "SELECT * FROM Items;";

                require_once "scripts/config.php";

                $result = $link->query($sql);

                if ($result->num_rows > 0) {
                    // Display all items
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='w3-card-4 w3-margin w3-white'>";
                        echo "<div class='w3-container'>";
                        echo "<h3><b>" . $row["itemName"] . "</b></h3>";

                        echo "<div class='w3-row'>";
                        echo "<div class='w3-col m8 s12'>";
                        echo "<p><a href='view_items.php?item=" . $row["itemID"] . "'><button class='w3-button w3-padding-large w3-white w3-border'><b>View Item Details</b></button></a></p>";
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
