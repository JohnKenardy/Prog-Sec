<?php 
echo("Page loaded");

require_once "../scripts/config.php";

echo("Config loaded");

//Store Posted in local Values
$User_Name = addslashes($_POST['name']);
$User_Email = addslashes($_POST['email']);
$User_Type = $_POST['userType'];

//check if any variable is empty
if(empty($User_Name) || empty($User_Email) || empty($User_Type)){
    header("location: add_user.php?e=3");
    exit;
}

echo("Values loaded");

$sql = "
        SELECT userID, username, email, userType
        FROM Users 
        WHERE username = '$Username';
        ";
        
$result = $link->query($sql);

echo("SQL executed");
    
if ($result->num_rows > 0) {
    echo("Results exist");
    header("location: add_user.php?e=1");
    exit;
}

echo("Results dont exist");

$sql = "
        INSERT INTO Users (name, email, userType)
        VALUES ('$User_Name', '$User_Email', '$User_Type');
		";

echo("SQL defined");

if ($link->query($sql) === TRUE) {
    echo("SQL Success");
	header("location: ../login.php");
}else {
    echo("Error");
    echo "Error: " . $link->error;
}
?>