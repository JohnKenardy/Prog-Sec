<?php
$servername = "localhost";
$username = "VLIMS";
$password = "Grp12VLIMS!";
$dbname = "progsec";

/* Attempt to connect to MySQL database */
$link = mysqli_connect($servername, $username, $password, $dbname);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
