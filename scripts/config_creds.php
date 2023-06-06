<?php
$servername = "localhost";
$username = "VLIMS";
$password = "Grp12VLIMS!";
$dbname = "vlims_credentials";

/* Attempt to connect to MySQL database */
$credlink = mysqli_connect($servername, $username, $password, $dbname);
 
// Check connection
if($credlink === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
