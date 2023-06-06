<?php

require_once "../scripts/config.php";
require_once "../scripts/config_creds.php";

//Store Posted in local Values
$User_Name = addslashes($_POST['name']);
$User_Email = addslashes($_POST['email']);
$User_Type = $_POST['userType'];
$Username = $_POST['username'];
$Password = addslashes($_POST['password']);
$Param_Password = password_hash($Password, PASSWORD_DEFAULT);

//check if any variable is empty
if(empty($User_Name) || empty($User_Email) || empty($User_Type) || empty($Username) || empty($Password)){
    header("location: add_user.php?e=2");
    exit;
}

$sql = "
        SELECT *
        FROM Users 
        WHERE email = '$User_Email';
        ";
        
$result = $link->query($sql);

    
if ($result->num_rows > 0) {
    echo("Results exist");
    header("location: add_user.php?e=1");
    exit;
}

$credsql = "
        SELECT *
        FROM Credentials 
        WHERE username = '$Username';
        ";

$credresult = $credlink->query($sql);

if ($credresult->num_rows > 0) {
    echo("Results exist");
    header("location: add_user.php?e=1");
    exit;
}

$sql = "
        INSERT INTO Users (name, email, userType, createDateTime)
        VALUES ('$User_Name', '$User_Email', '$User_Type', NOW());
		";

$userID = -1;

if ($link->query($sql) === TRUE) {
    echo("Users Add -> SQL Success");
}else {
    echo("<br>Users Add -> Error <br>");
    echo "Error: " . $link->error;
}

//Get UserID
$sql = "
        SELECT userID
        FROM Users 
        WHERE email = '$User_Email';
        ";

$result = $link->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $userID = $row["userID"];
    }
}else{
    echo("<br>Users Check -> Error <br>");
    echo "Error: " . $link->error;
}

if($UserID != -1){
    $credsql = "
        INSERT INTO Credentials (userID, username, password)
        VALUES ('$userID', '$Username', '$Param_Password');
        ";

    if ($credlink->query($credsql) === TRUE) {
        header("location: ../login.php");
    }else {
        echo("<br>Credentials Add -> Error <br>");
        echo "Error: " . $credlink->error;
    }
}else{
    echo("USERID ERROR!");
}

?>