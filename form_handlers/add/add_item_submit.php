<?php 
echo("Page loaded");
include("../../scripts/sessioncheck.php");
require_once "../../scripts/config.php";

echo("Config loaded");

$itemName = addslashes($_POST['itemName']);
$itemRFID = addslashes($_POST['itemRFID']);

//check if any variable is empty
if(empty($itemName) || empty($itemRFID)){
    header("location: ../../add_item.php?e=1");
    exit;
}

echo("Values loaded");

$sql = "
        INSERT INTO Items (itemName, itemRFID, createUserID, createDateTime)
        VALUES ('$itemName', '$itemRFID','$UserID', NOW());
		";

echo("SQL defined");

if ($link->query($sql) === TRUE) {
    echo("SQL Success");
	header("location: ../../view_items.php"); //update to view all items
}else {
    echo("Error");
    echo "Error: " . $link->error;
}



?>