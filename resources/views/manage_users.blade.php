
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

    <!--Modals-->
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
    <!--Table-->
    @if(Session::has('success'))
        <div class="alert alert-success w3-green">{{Session::get('success')}}</div>
    @endif
    @if(Session::has('fail'))
        <div class="alert alert-danger w3-red">{{Session::get('fail')}}</div>
    @endif
    <div class="w3-container">
        <table class="w3-table w3-padding-24">
            <tr class="w3-border-pale-blue">
                <th>Name</th>
                <th>Rank</th>
                <th>Unit</th>
                <th>Role</th>
                <th>Access Level</th>
                <th>Email</th>
            </tr>
            @foreach($users as $user)
                <tr onclick="document.getElementById('{{$user->userId}}').style.display='block'" class="w3-hover-blue-gray">
                    <td>{{$user->name}}</td>
                    <td>{{$user->rank}}</td>
                    <td>{{$user->unit}}</td>
                    <td>{{$user->role}}</td>
                    <td>{{$user->accessLevel}}</td>
                    <td>{{$user->email}}</td>
                </tr>
                <div id ="{{$user->userId}}" class="w3-modal">
                    <div class="w3-modal-content w3-card-4">
                        <header class="w3-container w3-blue-gray">
                            <span onclick="document.getElementById('{{$user->userId}}').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                            <h2>Edit User</h2>
                        </header>

                        <div class="w3-container w3-padding-16">
                            <div class="w3-main">
                                <div class="w3-panel">
                                    <div class="w3-container w3-card-4 w3-light-grey" style="max-width: 400px; margin: 50px auto 0;">

                                        <!--Edit form-->
                                        <form class="w3-container" style="padding: 20px;" action="{{url('dashboard/updateUser/'.$user->userId)}}" method="post" autocomplete="off" id="editUserForm">
                                            @csrf
                                            <h2>Edit Details:</h2>
                                            <div class="form-group d-none">
                                                <label for ="editName">User Name</label>
                                                <input type="text" class="form-control" id="editName" value="{{$user->name}}" name="name" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="editRank"> Rank </label>
                                                <select class="form-control" id="editRank" name="rank" required>
                                                    <option disabled selected value="{{$user->rank}}">{{$user->rank}}</option>
                                                    @foreach($ranks as $r)
                                                        <option value="{{$r->rankId}}">{{$r->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="editUnit">Unit</label>
                                                <select class="form-control" id="editUnit" name="unit" required>
                                                    <option disabled selected value="{{$user->unit}}">{{$user->unit}}</option>
                                                    @foreach($units as $u)
                                                        <option value="{{$u->unitId}}">{{$u->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for ="editRole">Role</label>
                                                <input type="text" class="form-control" id="editRole" value="{{$user->role}}" placeholder="Position" name="role" required>
                                            </div>
                                            <div class="form-group">
                                                <label for ="editAccessLevel">User Security level</label>
                                                <select class="form-control" id="editAccessLevel" name="accessLevel" required>
                                                    <option disabled selected value="{{$user->accessLevel}}">{{$user->accessLevel}}</option>
                                                    <option  value="0">0</option>
                                                    <option  value="1">1</option>
                                                    <option  value="2">2</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for ="editEmail">User Email</label>
                                                <input type="text" class="form-control" id="editEmail" value="{{$user->email}}" placeholder="Enter valid email" name="email" required>
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


                <div id="{{$user->userId}}" class="w3-modal">
                    <div class="w3-modal-content w3-card-4">
                        <header class="w3-container w3-blue-gray">
                        <span onclick="document.getElementById('{{$user->userId}}').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                            <h2>Manage {{$user->name}}</h2>
                        </header>
                        <div class="w3-container w3-padding-16">
                            <button onclick="document.getElementById('{{$user->userId}}').style.display='block', document.getElementById('{{$user->userId}}').style.display='none'" class="w3-btn w3-blue w3-round w3-half">Edit</button>
                            <button class="w3-btn w3-pale-red w3-round w3-half" >Delete</button>
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





