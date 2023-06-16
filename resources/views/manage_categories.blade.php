
<!DOCTYPE html>

<html>
<head>
    <title>RFID Tool - Manage Categories</title>

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
    <button onclick="document.getElementById('addbtn').style.display='block'" class="w3-btn w3-blue-gray w3-round w3-padding-16 w3-margin">Add Category</button>
    <div id="addbtn" class="w3-modal">
        <div class="w3-modal-content w3-card-4">
            <header class="w3-container w3-blue-gray">
                <span onclick="document.getElementById('addbtn').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                <h2>Add Category</h2>
            </header>
            <!-- Edit here-->
            <div class="w3-main w3-padding-16">
                <div class="w3-panel">
                    <div class="w3-container w3-card-4 w3-light-grey" style="max-width: 400px; margin: 50px auto 0;">
                        <h2>Category Details:</h2>
                        @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
                        @if(Session::has('exists'))
                            <div class="alert alert-success">{{Session::get('exists')}}</div>
                        @endif
                        @if(Session::has('fail'))
                            <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif
                        <form id="createCategoryForm" style="padding: 20px;"  action="{{route('addCategory')}}" method="post" autocomplete="off" >
                            @csrf
                            <div class="form-group">
                                <label for ="name">Category name</label>
                                <input type="text" class="form-control" id="name" placeholder="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for ="description">Description</label>
                                <input type="text" class="form-control" id="description" placeholder="Category Description" name="description" required>
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
                <th>Category Code</th>
                <th>Name</th>
                <th>Description</th>

            </tr>
            @foreach($categories as $c)
                <tr onclick="document.getElementById('{{$c->categoryId}}').style.display='block'" class="w3-hover-blue-gray">
                    <td>{{$c->categoryId}}</td>
                    <td>{{$c->name}}</td>
                    <td>{{$c->description}}</td>

                </tr>
                <div id="{{$c->categoryId}}" class="w3-modal">
                    <div class="w3-modal-content w3-card-4">
                        <header class="w3-container w3-blue-gray">
                            <span onclick="document.getElementById('{{$c->categoryId}}').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                            <h2>Manage {{$c->name}}</h2>
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










