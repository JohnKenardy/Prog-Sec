<?php 

    include("../scripts/sessioncheck.php");
    if($loggedin == 1){
        header("location: index.php");
        exit;
    }

    require_once "../scripts/config.php";

    //Store Posted in local Values
    $Username = addslashes($_POST['username']);
    $Password = addslashes($_POST['password']);

    $sql = "
            SELECT userID, username, password 
            FROM Users 
            WHERE username = '$Username'
            ";
            
    $result = $link->query($sql);
        
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // output data of each row
            $UserID = $row["userID"];
            $Username = $row["username"];
            $User_Password = $row["password"];
        }
        
        if(password_verify($Password, $User_Password)){
            session_start();
                            
            // Store data in session variables
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $UserID;
            $_SESSION["username"] = $Username;                            

            // Redirect user to welcome page
            header("location: ../index.php");
            exit;
        }else{
            // Incorrect Username/Password
            header("location: ../login.php?e=1");
        }
        
        
    }else{
            // Incorrect Username/Password
            header("location: ../login.php?e=1");
    }
?>