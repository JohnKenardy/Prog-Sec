
<!DOCTYPE html>

<html>
<head>
    <title>RFID Tool - Manage Equipment Type</title>

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
    <button onclick="document.getElementById('addbtn').style.display='block'" class="w3-btn w3-blue-gray w3-round w3-padding-16 w3-margin">Add Equipment Type</button>
    <div id="addbtn" class="w3-modal">
        <div class="w3-modal-content w3-card-4">
            <header class="w3-container w3-blue-gray">
                <span onclick="document.getElementById('addbtn').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                <h2>Add Equipment Type</h2>
            </header>
            <!-- Edit here-->
            <div class="w3-container w3-padding-16">
                <div class="w3-main">
                    <div class="w3-panel">
                        <div class="w3-container w3-card-4 w3-light-grey" style="max-width: 400px; margin: 50px auto 0;">
                            <h2>Create New Item:</h2>
                            @if(Session::has('success'))
                                <div class="alert alert-success">{{Session::get('success')}}</div>
                            @endif
                            @if(Session::has('fail'))
                                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                            @endif
                            <form id="createItemForm" style="padding: 20px;"  action="{{route('addType')}}" method="post" autocomplete="off" >
                                @csrf
                                <div class="form-group">
                                    <label for="category"> Type </label>
                                    <select class="form-control" id="category" name="category" required>
                                        <option disabled selected value="">Item Type</option>
                                        @foreach($categories as $c)
                                            <option value="{{$c->categoryId}}">{{$c->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for ="description">Equipment Type (Model)</label>
                                    <input type="text" class="form-control" id="description" placeholder="Designation" name="description" required>
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
                <th>Type Code</th>
                <th>Category Code</th>
                <th>Description</th>
            </tr>
            @foreach($types as $t)
                <tr onclick="document.getElementById('{{$t->typeId}}').style.display='block'" class="w3-hover-blue-gray">
                    <td>{{$t->typeId}}</td>
                    <td>{{$t->category}}</td>
                    <td>{{$t->description}}</td>

                </tr>
                <div id="{{$t->typeId}}" class="w3-modal">
                    <div class="w3-modal-content w3-card-4">
                        <header class="w3-container w3-blue-gray">
                            <span onclick="document.getElementById('{{$t->typeId}}').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                            <h2>Manage Equipment Types</h2>
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





