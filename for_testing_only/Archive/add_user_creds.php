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
    <form method="POST" action="add_user_submit_creds.php" onsubmit="return validateForm()">
        <label for="UserID">UserID:</label>
        <input type="UserID" id="UserID" name="UserID" required>
        <br><br>
        
        <label for="username">username:</label>
        <input type="username" id="username" name="username" required>
        <br><br>
        
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
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
                    echo('ErrorMessage += "<strong>Username in Use</strong>"');
                }else if($e == 2){
                    echo('ErrorMessage += "<strong>Email in Use</strong>"');
                }
                else if($e == 3){
                    echo('ErrorMessage += "<strong>Missing Data</strong>"');
                }
            }
            ?>
            
        document.getElementById("Error").innerHTML = ErrorMessage;
    </script>
</body>
</html>
