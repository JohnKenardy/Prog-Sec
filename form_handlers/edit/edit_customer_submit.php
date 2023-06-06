<?php 
echo("Page loaded");
include("../../scripts/sessioncheck.php");
require_once "../../scripts/config.php";

echo("Config loaded");


$customerID = addslashes($_POST['customerID']);
$customerName = addslashes($_POST['customerName']);
$companyID = addslashes($_POST['companyID']);
$role = addslashes($_POST['role']);
$userID = addslashes($_POST['userID']);

//check if any variable is empty
if(empty($customerName) || empty($companyID) || empty($role) || empty($userID)){
    header("location: ../../edit_customer.php?e=1");
    exit;
}

echo("Values loaded");

$sql = "
    UPDATE Customers 
    SET customerName = '$customerName', companyID = '$companyID', role = '$role', userID = '$userID', customerUserID = '$UserID', customerDateTime = NOW()
    WHERE customerID = '$customerID'
    ";

echo("SQL defined");

if ($link->query($sql) === TRUE) {
    echo("SQL Success");
	header("location: ../../view_customers.php"); //update to view customers
}else {
    echo("Error");
    echo "Error: " . $link->error;
}



?>