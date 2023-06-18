<div id ="editBtn" class="w3-modal">
    <div class="w3-modal-content w3-card-4">
        <header class="w3-container w3-blue-gray">
            <span onclick="document.getElementById('editBtn').style.display='none'" class="w3-button w3-display-topright">&times;</span>
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
                                <label for ="editPassword">Your Password:</label>
                                <input type="password" class="form-control" id="editPassword" placeholder="Password?" name="password" required>
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
