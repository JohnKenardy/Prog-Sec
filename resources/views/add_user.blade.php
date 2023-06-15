<?php
/*include("scripts/sessioncheck.php");
    if($loggedin == 0){
        header("location: login.php");
        exit;
    }*/
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Viden LIMS - Create New Customer</title>

            @include('style')
    </head>
<body class="w3-light-grey">

    @include('sidebar')

        <!-- !PAGE CONTENT! -->
        <div class="w3-main" style="margin-left:250px;margin-top:43px;">
            <div class="w3-panel">
                <div class="w3-container w3-card-4 w3-light-grey" style="max-width: 400px; margin: 0 auto; margin-top: 50px;">
                    <form class="w3-container" style="padding: 20px;" action="" method="post" autocomplete="off" id="createUserForm">
                        @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
                        @if(Session::has('fail'))
                            <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif
                        @csrf
                        <h2>Create New User:</h2>
                        <a href="view_customers.php" class="w3-button w3-blue">Back to All Customers</a>
                        <br><br>


                        <label for="customerName">Customer Name:</label>
                            <input type="text" id="customerName" name="customerName" required>
                        <br><br>

                        <label for="companyID">Company:</label>
                        <select id="companyID" name="companyID" required>


                        </select>
                        <br><br>

                        <label for="role">Role:</label>
                            <input type="text" id="role" name="role" required>
                        <br><br>

                        <label for="userID">User:</label>
                        <select id="userID" name="userID" required>
                        </select>
                        <br><br>

                        <input type="submit" value="Submit" class="w3-button w3-blue">

                        <p><span id="Error" style="color: red" style="margin-bottom: 20px;"></span></p>
                    </form>
                </div>
            </div>
        </div>

    </body>
</html>
