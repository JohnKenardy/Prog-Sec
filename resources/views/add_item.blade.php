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
        <title>RFID Tool - Create New Item</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">

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
            <div class="w3-panel">
                <div class="w3-container w3-card-4 w3-light-grey" style="max-width: 400px; margin: 50px auto 0;">

            <form id="createItemForm" style="padding: 20px;"  action="{{route('addItem')}}" method="post" autocomplete="off" >
                @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                @csrf
                <h2>Create New Item:</h2>
                <div class="form-group">
                    <label for ="rfid">Item RFID</label>
                    <input type="text" class="form-control" id="rfid" placeholder="8 digit RFID" name="rfid" required>
                </div>
                <div class="form-group">
                    <label for="type"> Type </label>
                    <select class="form-control" id="type" name="type" required>
                        <option disabled selected value="">Item Type</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="unit"> Unit </label>
                    <select class="form-control" id="unit" name="unit" required>
                        <option disabled selected value="">Assigned Unit</option>
                    </select>
                </div>
                <div class="form-group d-none">
                    <label for ="inspector">InspectorID</label>
                    <input type="text" class="form-control" id="inspector" name="inspector" value ="{{$data->userId}}" readonly required>
                </div>
                <div class="form-group">
                    <label for ="inspectorComments">Inspector comments</label>
                    <input type="text" class="form-control" id="inspectorComments" placeholder="Inspector Comments" name="comments">
                </div>
                <div class="form-group">
                    <label for ="conditionDescription">Condition</label>
                    <select class="form-control" id="conditionDescription" name="conditionDescription" required>
                        <option disabled selected value="">Item condition</option>
                        <option  value="">serviceable</option>
                        <option  value="">defective</option>
                        <option  value="">unserviceable</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for ="storage">Storage Location</label>
                    <select class="form-control" id="storage" name="storage" required>
                        <option disabled selected value="">Storage Location</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary w3-right w3-blue-gray" style="margin-bottom: 10px" onclick="">Submit</button>
                </div>
            </form>
                    <script src="{{asset('js/createItem.js')}}"></script>
                    <script>loadTypes(); loadUnits(); loadStorage();</script>

                </div>
            </div>
        </div>

            @include('footer')
        </body>
</html>
