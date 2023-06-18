
<!DOCTYPE html>

<html>
<head>
    <title>RFID Tool - Manage Units</title>

    @include('style')
    <style>
        .form-group{
            padding: 15px;
        }
    </style>


</head>
<body class="w3-light-grey">

@include('sidebar')


<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px;margin-top:43px;">
    <button onclick="document.getElementById('addbtn').style.display='block'" class="w3-btn w3-blue-gray w3-round w3-padding-16 w3-margin">Add Unit</button>
    <div id="addbtn" class="w3-modal">
        <div class="w3-modal-content w3-card-4">
            <header class="w3-container w3-blue-gray">
                <span onclick="document.getElementById('addbtn').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                <h2>Add Unit</h2>
            </header>
            <!-- Edit here-->
            <div class="w3-main w3-padding-16">
                <div class="w3-panel">
                    <div class="w3-container w3-card-4 w3-light-grey" style="max-width: 400px; margin: 50px auto 0;">
                        <h2>Unit Details:</h2>
                        @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
                        @if(Session::has('exists'))
                            <div class="alert alert-success">{{Session::get('exists')}}</div>
                        @endif
                        @if(Session::has('fail'))
                            <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif
                        <form id="createCategoryForm" style="padding: 20px;"  action="{{route('addUnit')}}" method="post" autocomplete="off" >
                            @csrf
                            <div class="form-group">
                                <label for ="name">Unit name</label>
                                <input type="text" class="form-control" id="name" placeholder="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for ="location">Description</label>
                                <input type="text" class="form-control" id="location" placeholder="Category Description" name="location" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary w3-right w3-blue-gray" style="margin-bottom: 10px">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w3-container">
        <table class="w3-table w3-border-black">
            <tr class="w3-border-pale-blue">
                <th>Unit Code</th>
                <th>Name</th>
                <th>Location</th>

            </tr>
            @foreach($units as $u)
                <tr onclick="document.getElementById('{{$u->unitId}}').style.display='block'" class="w3-hover-blue-gray">
                    <td>{{$u->unitId}}</td>
                    <td>{{$u->name}}</td>
                    <td>{{$u->location}}</td>

                </tr>
                <div id="{{$u->unitId}}" class="w3-modal">
                    <div class="w3-modal-content w3-card-4">
                        <header class="w3-container w3-blue-gray">
                            <span onclick="document.getElementById('{{$u->unitId}}').style.display='none'" class="w3-button w3-display-topright">&times;</span>
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










