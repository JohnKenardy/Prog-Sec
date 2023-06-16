
<!DOCTYPE html>

<html>
<head>
    <title>RFID Tool - Manage Users</title>

@include('style')
<style>
    .form-group{
        padding: 10px;
    }
</style>


</head>
<body class="w3-light-grey">

@include('sidebar')


<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px;margin-top:43px;">
   <button onclick="document.getElementById('addbtn').style.display='block'" class="w3-btn w3-blue-gray w3-round w3-padding-16 w3-margin">Add User</button>
    <div id="addbtn" class="w3-modal">
        <div class="w3-modal-content w3-card-4">
            <header class="w3-container w3-blue-gray">
                <span onclick="document.getElementById('addbtn').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                <h2>Add User</h2>
            </header>
            <!-- Edit here-->
            <div class="w3-container w3-padding-16">
                <div class="w3-main">
                    <div class="w3-panel">
                        <div class="w3-container w3-card-4 w3-light-grey" style="max-width: 400px; margin: 0 auto; margin-top: 50px;">
                            @if(Session::has('success'))
                                <div class="alert alert-success">{{Session::get('success')}}</div>
                            @endif
                            @if(Session::has('fail'))
                                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                            @endif
                            <form class="w3-container" style="padding: 20px;" action="{{'addUser'}}" method="post" autocomplete="off" id="createUserForm">
                                @csrf
                                <h2>User Details:</h2>
                                <div class="form-group d-none">
                                    <label for ="name">User Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>

                                <div class="form-group">
                                    <label for="rank"> Rank </label>
                                    <select class="form-control" id="rank" name="rank" required>
                                        <option disabled selected value="">Item Type</option>
                                        @foreach($ranks as $r)
                                            <option value="{{$r->rankId}}">{{$r->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="unit">Unit</label>
                                    <select class="form-control" id="unit" name="unit" required>
                                        <option disabled selected value="">Item Type</option>
                                        @foreach($units as $u)
                                            <option value="{{$u->unitId}}">{{$u->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for ="role">Role</label>
                                    <input type="text" class="form-control" id="role" placeholder="Position" name="role" required>
                                </div>
                                <div class="form-group">
                                    <label for ="accessLevel">User Security level</label>
                                    <select class="form-control" id="accessLevel" name="accessLevel" required>
                                        <option disabled selected value="">Security Level</option>
                                        <option  value="0">0</option>
                                        <option  value="1">1</option>
                                        <option  value="2">2</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for ="email">User Email</label>
                                    <input type="text" class="form-control" id="email" placeholder="Enter valid email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for ="password">Password:</label>
                                    <input type="password" class="form-control" id="password" placeholder="Password?" name="password" required>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="w3-btn btn-primary w3-right w3-blue-gray" style="margin-bottom: 10px">Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="w3-container">
        <table class="w3-table w3-border-black">
            <tr class="w3-border-pale-blue">
                <th class="">Name</th>
                <th>Rank</th>
                <th>Unit</th>
                <th>Role</th>
                <th>Access Level</th>
                <th>Email</th>
            </tr>
            @foreach($users as $u)
                <tr onclick="document.getElementById('{{$u->userId}}').style.display='block'" class="w3-hover-blue-gray">
                    <td>{{$u->name}}</td>
                    <td>{{$u->rank}}</td>
                    <td>{{$u->unit}}</td>
                    <td>{{$u->role}}</td>
                    <td>{{$u->accessLevel}}</td>
                    <td>{{$u->email}}</td>
                </tr>
                <div id="{{$u->userId}}" class="w3-modal">
                    <div class="w3-modal-content w3-card-4">
                        <header class="w3-container w3-blue-gray">
                        <span onclick="document.getElementById('{{$u->userId}}').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                            <h2>Manage {{$u->name}}</h2>
                        </header>
                        <div class="w3-container w3-padding-16">
                            <button class="w3-btn w3-blue w3-round w3-half">Edit</button></span>
                            <button class="w3-btn w3-pale-red w3-round w3-half">Delete</button>
                        </div>
                    </div>
                </div>

            @endforeach

        </table>

    </div>

</div>

@include('footer')
</body>
</html>





