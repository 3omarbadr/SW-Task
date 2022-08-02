// -------------------------------------------------------------------------------------------------------------------
// ShowElement FUNCTION IS THE MAIN FUNCTION FOR HANDLING THE LOGIC BEHIND CHOOSING AN OPTION FROM THE DROP DOWN LIST |
// -------------------------------------------------------------------------------------------------------------------


function showElement() {
    // Selection of the dropdown value and showing the inputs depending on the selection
    var select = document.getElementById('productType').value;

    function reset_weight_val() {
        document.getElementById('weight').value = "";
    }
    function reset_size_val() {
        document.getElementById('size').value = "";
    }
    function reset_dimensions_vals() {
        document.getElementById('height').value = "";
        document.getElementById('length').value = "";
        document.getElementById('width').value = "";
    }

    // That is only for the front end part and doesn't do any other logic of the application 
    switch (select) {
        case "Book":
            // Hiding size, dimensions and showing weight
            hide_size_input();
            hide_dimensions_inputs();
            show_weight_input();
            // Not requiring size, dimensions but weight
            make_size_input_notRequired();
            make_dimensions_input_notRequired();
            make_weight_input_required();
            //Resetting value of size and dimensions to ""
            reset_size_val();
            reset_dimensions_vals();

            break;
        case "DVD":
            // Hiding weight, dimensions and showing size
            hide_weight_input();
            hide_dimensions_inputs();
            show_size_input();
            // Not requiring size, dimensions but size
            make_weight_input_notRequired();
            make_dimensions_input_notRequired();
            make_size_input_required()
            //Resetting value of weight and dimensions to ""
            reset_weight_val()
            reset_dimensions_vals();


            break;
        case 'Furniture':
            // Hiding size, weight and showing dimensions
            hide_size_input();
            hide_weight_input();
            show_dimensions_inputs();
            // Not requiring size, weight but dimensions
            make_size_input_notRequired();
            make_weight_input_notRequired();
            make_dimensions_inputs_required()
            //Resetting value of size and weight to ""
            reset_size_val();
            reset_weight_val()
            break
    }

}

// Getting elements
var weight = document.getElementById('productWeight');
var size = document.getElementById('productSize');
var width = document.getElementById('productWidth');
var length = document.getElementById('productLength');
var height = document.getElementById('productHeight');

// --------------------------------------------------------------------------------------
// FUNCTIONS' IMPLEMENTATION                                                             |
// --------------------------------------------------------------------------------------

// Implementation of input showing and hiding functions                                 
function show_dimensions_inputs() {
    width.style.display = 'block';
    length.style.display = 'block';
    height.style.display = 'block';
}

function hide_dimensions_inputs() {
    width.style.display = 'none';
    length.style.display = 'none';
    height.style.display = 'none';
}

function show_size_input() {
    size.style.display = 'block';
}
function hide_size_input() {
    size.style.display = 'none';
}
function show_weight_input() {
    weight.style.display = 'block';

}
function hide_weight_input() {
    weight.style.display = 'none';
}

// Implementation of input required or not functions
function make_weight_input_required() {
    document.getElementById('weight').required = true;
}
function make_size_input_required() {
    document.getElementById('size').required = true;
}
function make_dimensions_inputs_required() {
    document.getElementById('width').required = true;
    document.getElementById('length').required = true;
    document.getElementById('height').required = true;
}

function make_weight_input_notRequired() {
    document.getElementById('weight').required = false;
}
function make_size_input_notRequired() {
    document.getElementById('size').required = false;
}
function make_dimensions_input_notRequired() {
    document.getElementById('width').required = false;
    document.getElementById('length').required = false;
    document.getElementById('height').required = false;

}

//Deleting the content of inputs
function reset_weight_val() {
    document.getElementById('weight').value = "";
}

function reset_size_val() {
    document.getElementById('size').value = "";
}

function reset_dimensions_vals() {
    document.getElementById('height').value = "";
    document.getElementById('length').value = "";
    document.getElementById('width').value = "";
}
