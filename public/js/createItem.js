var userForm = document.getElementById('createItemForm');


function loadTypes(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "http://localhost:8000/type/getAll",
        type: "GET",

        success: function(response){
            for(var i = 0; i <= response.length -1; i++){
                var itemTypes = userForm.elements.type;
                // Create a new option element
                var option = document.createElement('option');
                option.value = response[i].typeId; // Set the value for the option
                option.textContent = response[i].description; // Set the text content for the option

                // Add the new option to the dropdown list
                itemTypes.add(option);
            }
        },
        error: function(xhr, status, error){
            console.log(error);
        }
    });
}
function loadUnits(){
    $.ajax({
        url: "http://localhost:8000/unit/getAll",
        type: "GET",
        success: function(response){
            for(var i = 0; i <= response.length -1; i++){
                var itemCondition = userForm.elements.unit;
                // Create a new option element
                var option = document.createElement('option');
                option.value = response[i].typeId; // Set the value for the option
                option.textContent = response[i].name; // Set the text content for the option

                // Add the new option to the dropdown list
                itemCondition.add(option);
            }
        },
        error: function(xhr, status, error){
            console.log(error);
        }
    });
}
function loadStorage(){
    $.ajax({
        url: "http://localhost:8000/storage/getAll",
        type: "GET",
        success: function(response){
            for(var i = 0; i <= response.length -1; i++){
                var itemCondition = userForm.elements.storage;
                // Create a new option element
                var option = document.createElement('option');
                option.value = response[i].storageId; // Set the value for the option
                option.textContent = response[i].locationName; // Set the text content for the option

                // Add the new option to the dropdown list
                itemCondition.add(option);
            }
        },
        error: function(xhr, status, error){
            console.log(error);
        }
    });
}
