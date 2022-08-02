//Main function for validation
function validate() {
    validate_name();
    validate_price();
    validate_specialAttr();
    validate_sku();

    return validate_price() && validate_name() && validate_specialAttr() && validate_sku();

}


//------------
//validate Sku
//------------

function correctSku() {
    let inputSku = get_elementVal('sku');
    let sku_state = check_regex(inputSku) && !(inputSku[0] == ' ');
    return sku_state;
}

function validate_sku() {
    if (!correctSku()) {
        //displaying alert block
        displayBlock('validationSkuAlert');
        //setting the content of alert dev
        setInnerHtml('validationSkuAlert', "Please, provide the data of indicated type");
        return false;
    } else {
        //hiding alert block
        dontDisplay('validationSkuAlert')
        return true
    }
}

//--------------
//validate name
//--------------

function validate_name() {


    //input name value
    let inputNameVal = get_elementVal('name')

    if (!Correct_name(inputNameVal)) {
        //displaying alert block
        displayBlock('validationNameAlert');
        //setting the content of alert dev
        setInnerHtml('validationNameAlert', "Please, provide the data of indicated type");
        return false;
    } else {
        //hiding alert block
        dontDisplay('validationNameAlert')
        return true
    }
}

//--------------
//validate price
//--------------

function validate_price() {
    return validate_numericInput('price', 'validationPriceAlert');
}


//-------------
//validate size
//-------------

function validate_size() {
    return validate_numericInput('size', 'validationSizeAlert');
}

//--------------
//validate weight
//--------------

function validate_weight() {
    return validate_numericInput('weight', 'validationWeightAlert');
}

//--------------
//validate height
//--------------

function validate_height() {
    return validate_numericInput('height', 'validationHeightAlert');
}


//---------------
//validate width
//---------------

function validate_width() {
    return validate_numericInput('width', 'validationWidthAlert');
}


//---------------
//validate length
//---------------

function validate_length() {
    return validate_numericInput('length', 'validationLengthAlert');
}

//-------------------
//validate dimensions
//-------------------
function validate_dimensions() {
    validate_height();
    validate_width();
    validate_length();
    return validate_height() && validate_width() && validate_length();
}

//---------------------------
//validate special Attributes
//---------------------------
function validate_specialAttr() {

    let current_type = get_elementVal('productType');

    switch (current_type) {
        case "Book":
            specialAttrValidation = validate_weight();
            break;
        case "DVD":
            specialAttrValidation = validate_size();
            break;
        case "Furniture":
            specialAttrValidation = validate_dimensions();
            break
    }

    return specialAttrValidation;

}


//-----------------------------------------------
//Sub functions used in main validation functions
//-----------------------------------------------

function validate_numericInput(input_id, alert_id) {
    //input name value
    let inputNumericVal = get_elementVal(input_id)

    if (Number(inputNumericVal) <= 0 || Number(inputNumericVal) == '-0') {
        //displaying alert block
        displayBlock(alert_id);
        //setting the content of alert dev
        setInnerHtml(alert_id, "Please, provide the data of indicated type");
        return false;
    } else {
        //hiding alert block
        dontDisplay(alert_id)
        return true;
    }
}


function get_element(id) {
    return document.getElementById(id);
}

function get_elementVal(id) {
    return get_element(id).value;
}

function displayBlock(id) {
    ele = get_element(id);
    ele.style.display = "block"
}

function dontDisplay(id) {
    ele = get_element(id);
    ele.style.display = "none"
}

function isNum(value) {
    let isNum = /^\d+$/.test(value);
    return isNum;
}

function isFirstIndexLetter(text) {
    let first_ele = text[0];
    let alphabits_rejex = /^[a-zA-Z_]+$/;
    //state for checking if input name apply to name regex
    let state = alphabits_rejex.test(first_ele);
    return state
}


//for setting inner HTML to specific id
function setInnerHtml(id, content) {
    document.getElementById(id).innerHTML = content;

}


function check_regex(inputval) {
    let nameRegex = /^[a-zA-Z0-9_-\s]+$/;
    //state for checking if input name apply to name regex
    let state = nameRegex.test(inputval);
    return state
}

function Correct_name(inputNameVal) {
    return check_regex(inputNameVal) && !isNum(inputNameVal) && isFirstIndexLetter(inputNameVal)
}





















