<!DOCTYPE html>
<html>
<head>
    <title>Add User Form</title>
    <script>
        function validateForm() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirmPassword").value;
            
            if (password !== confirmPassword) {
                ErrorMessage = "<strong>Passwords don't match</strong>"
                document.getElementById("Error").innerHTML = ErrorMessage;
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <form method="POST" action="add_user_submit.php" onsubmit="return validateForm()">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br><br>
        
        <label for="userType">User Type:</label>
        <select id="userType" name="userType" required>
            <option value="" disabled selected>Select user type</option>
            <option value="Admin">Admin</option>
            <option value="Manager">Staff</option>
        </select>
        <br><br>
        
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br><br>
        
        <label for="confirmPassword">Confirm Password:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required>
        <br><br>
        
        <input type="submit" value="Submit">

        <p><span id="Error" style="color: red" style="margin-bottom: 20px;"></span></p>
    </form>
    <script>
        var ErrorMessage = "";

            <?php
            if(isset($_GET["e"])){
                $e=$_GET["e"];
            }
            if(isset($e)){
                if($e == 1){
                    echo('ErrorMessage += "<strong>Username/Email in Use</strong>"');
                }else if($e == 2){
                    echo('ErrorMessage += "<strong>Missing Data</strong>"');
                }
            }
            ?>
            
        document.getElementById("Error").innerHTML = ErrorMessage;
    </script>
</body>
</html>
