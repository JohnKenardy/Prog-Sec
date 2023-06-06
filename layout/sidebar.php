<!-- Top container -->
<div class="w3-bar w3-top w3-large" style="z-index:4; background-color:#c4c2c2">
<button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey w3-right" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
<span class="w3-bar-item w3-left">
    <a href="index.php"><img src="images/logo.png" alt="logo" style="height:20px;"></a>
</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:250px;" id="mySidebar"><br>
<div class="w3-container w3-row">
    <div class="w3-col s8 w3-bar">
    <span>Welcome, <strong><?php echo($User_Name) ?></strong></span><br>
    <span style="font-style:italic; font-size:small;"><?php echo($User_Type) ?></span><br>
    <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
    <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
    <a href="scripts/logout.php" class="w3-bar-item w3-button"><i class="fa fa-sign-out"></i></a>
    </div>
</div>
<hr>
<div class="w3-container">
    <h5>Dashboard</h5>
</div>
<div class="w3-bar-block">
            <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
            <a href="index.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Overview</a>
            <a href="view_items.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-list fa-fw"></i>  View Items</a>
        </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
