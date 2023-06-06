<?php
require_once "../scripts/config_creds.php"
//Store Posted in local Values
$UserID = addslashes($_POST['UserID']);
$Username = $_POST['username'];
$Password = addslashes($_POST['password']);
$Param_Password = password_hash($Password, PASSWORD_DEFAULT);

//check if any variable is empty
if(empty($User_Name) || empty($User_Email) || empty($User_Type) || empty($Username) || empty($Password)){
    header("location: add_user.php?e=2");
    exit;
}

$credsql = "
        SELECT *
        FROM Credentials;
        ";

$credresult = $credlink->query($sql);

$credsql = "
    INSERT INTO Credentials (userID, username, password)
    VALUES ('$UserID', '$Username', '$Param_Password');
    ";

if ($credlink->query($credsql) === TRUE) {
    header("location: ../login.php");
}else {
    echo("Credentials -> Error");
    echo ("Error: " . $credlink->error);
}
?>