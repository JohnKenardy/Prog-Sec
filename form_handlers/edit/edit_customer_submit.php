<?php 
echo("Page loaded");
include("../../scripts/sessioncheck.php");
require_once "../../scripts/config.php";

echo("Config loaded");

$itemID = addslashes($_POST['itemID']);
$itemName = addslashes($_POST['itemName']);
$itemRFID = addslashes($_POST['itemRFID']);

//check if any variable is empty
//check if any variable is empty
if(empty($itemID) || $itemName) || empty($itemRFID)){
    header("location: ../../add_item.php?e=1");
    exit;
}

echo("Values loaded");

$sql = "
    UPDATE Items 
    SET itemName = '$itemName', itemRFID = '$itemRFID', createUserID = '$UserID', createDateTime = NOW()
    WHERE itemID = '$itemID'
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