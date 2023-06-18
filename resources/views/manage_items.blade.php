<!DOCTYPE html>

<html>

<head>
    <title>RFID Tool - Manage Items</title>

    @include('style')
    <style>
        .form-group {
            padding: 15px;
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
                    <h2>Add Equipment</h2>
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
                                <form id="createItemForm" style="padding: 20px;" action="{{route('addItem')}}" method="post" autocomplete="off">
                                    @csrf

                                    <div class="form-group">
                                        <label for="rfid">Item RFID</label>
                                        <input type="text" class="form-control" id="rfid" placeholder="8 digit RFID" name="rfid" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="type"> Type </label>
                                        <select class="form-control" id="type" name="type" required>
                                            <option disabled selected value="">Item Type</option>
                                            @foreach($types as $i)
                                            <option value="{{$i->typeId}}">{{$i->description}}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="unit"> Unit </label>
                                        <select class="form-control" id="unit" name="unit" required>
                                            <option disabled selected value="">Assigned Unit</option>
                                            @foreach($units as $i)
                                            <option value="{{$i->unitId}}">{{$i->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group d-none">
                                        <label for="inspector">InspectorID</label>
                                        <input type="text" class="form-control" id="inspector" name="inspector" value="{{$data->userId}}" readonly required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inspectorComments">Inspector comments</label>
                                        <input type="text" class="form-control" id="inspectorComments" placeholder="Inspector Comments" name="inspectorComments" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="conditionDescription">Condition</label>
                                        <select class="form-control" id="conditionDescription" name="conditionDescription" required>
                                            <option disabled selected value="">Item condition</option>
                                            <option value="serviceable">serviceable</option>
                                            <option value="defective">defective</option>
                                            <option value="unserviceable">unserviceable</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="storage">Storage Location</label>
                                        <select class="form-control" id="storage" name="storage" required>
                                            <option disabled selected value="1">Storage Location</option>
                                            @foreach($locations as $i)
                                            <option value="{{$i->storageId}}">{{$i->locationName}}</option>
                                            @endforeach
                                        </select>
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
                    <th>RFID</th>
                    <th>Type Code</th>
                    <th>Assigned Unit Code</th>
                    <th>Inspector ID</th>
                    <th>Inspector comments</th>
                    <th>Inspection Date</th>
                    <th>Condition</th>
                    <th>Storage Loc. Code</th>
                </tr>
                @foreach($items as $i)
                <tr onclick="document.getElementById('{{$i->itemId}}').style.display='block'" class="w3-hover-blue-gray">
                    <td>{{$i->rfid}}</td>
                    <td>{{$i->type}}</td>
                    <td>{{$i->unit}}</td>
                    <td>{{$i->inspector}}</td>
                    <td>{{$i->inspectorComments}}</td>
                    <td>{{$i->inspectionDate}}</td>
                    <td>{{$i->conditionDescription}}</td>
                    <td>{{$i->storage}}</td>
                </tr>
                <div id="{{$i->itemId}}" class="w3-modal">
                    <div class="w3-modal-content w3-card-4">
                        <header class="w3-container w3-blue-gray">
                            <span onclick="document.getElementById('{{$i->itemId}}').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                            <h2>Manage Equipment</h2>
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