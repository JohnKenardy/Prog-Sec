<?php
    // Initialize the session
    session_start();
    $UserID = "";
    // Check if the user is logged in
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){ //If Not
        $loggedin = 0;
        $User_Name = "User Name";
        $User_Type = "Not Logged In";
    }else{  //If They are
        $loggedin = 1;
        
        require_once "config.php";
        
        $sql = "
            SELECT *
            FROM Users
            WHERE userID = " . $_SESSION["id"];
            
        $result = $link->query($sql);
        

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                // output data of each row
                $UserID = $row["userID"];
                $User_Name = $row["name"];
                $User_Type = $row["userType"];
                $User_Email = $row["email"];
            }
        } else {
            echo "Error";
        }
    }
?>
