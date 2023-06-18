<!-- Top container -->
<div class="w3-bar w3-top w3-large" style="z-index:4; background-color:#c4c2c2">
<button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey w3-right" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
<span class="w3-bar-item w3-left">
    <a href="{{route('dashboard')}}"><img src="{{asset('images/logo.png')}}" alt="logo" style="height:20px;"></a>
</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:250px;" id="mySidebar"><br>
<div class="w3-container w3-row">
    <div class="w3-col s8 w3-bar">
    <span>Welcome, <strong>{{$data->name}}</strong></span>
    <a href="{{route('logout')}}" class="w3-bar-item w3-button"><i class="fa fa-sign-out w3-button">SignOut</i></a>
    </div>
</div>
<hr>
<div class="w3-container">
    <h5>Dashboard</h5>
</div>
<div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="{{route('dashboard')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Overview</a>
    <a href="{{route('manage-users')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-list fa-fw"></i>  Manage Users</a>
    <a href="{{route('manage-ranks')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-list fa-fw"></i>  Manage Ranks</a>
    <a href="{{route('manage-units')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-list fa-fw"></i>  Manage Units</a>
    <a href="{{route('manage-storage')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-list fa-fw"></i>  Manage Storages</a>
    <a href="{{route('manage-types')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-list fa-fw"></i>  Manage Equipment Types</a>
    <a href="{{route('manage-items')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-list fa-fw"></i>  Manage Items</a>
    <a href="{{route('manage-categories')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-list fa-fw"></i>  Manage Categories</a>


</div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
