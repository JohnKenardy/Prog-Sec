<?php 
echo("Page loaded");
include("../../scripts/sessioncheck.php");
require_once "../../scripts/config.php";

echo("Config loaded");

$customerName = addslashes($_POST['customerName']);
$companyID = addslashes($_POST['companyID']);
$role = addslashes($_POST['role']);
$userID = ($_POST['userID']);

//check if any variable is empty
if(empty($customerName) || empty($companyID) || empty($role) || empty($userID)){
    header("location: ../../create_new_customer.php?e=1");
    exit;
}

echo("Values loaded");

$sql = "
        INSERT INTO Customers (customerName, companyID, role, userID, customerUserID, customerDateTime)
        VALUES ('$customerName', '$companyID', '$role', '$userID','$UserID', NOW());
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