/**
 * This script is used on any page with user inputted forms.
 * It is a first line of defence on injection attacks and on missed inputs
 */


/**
 * This method validates any input against injections or emptiness
 * 
 * @param anInput
 * 
 * @return boolean
 */
function validateClientSide(anInput){
    if(/\b(ALTER|CREATE|DELETE|DROP|EXEC(UTE){0,1}|INSERT( +INTO){0,1}|MERGE|SELECT|UPDATE|UNION( +ALL){0,1})\b|<|>|^$/.test(anInput) == true){
        document.getElementById("inputErrors").innerHTML = "Invalid Input";
        return false;
    }
}
/**
 * This method validates the form found on login.php
 * 
 * @return boolean //false if injection or empty found
 */
function validateLogin(){
    var email = document.forms["loginForm"]["email"].value;
    var password = document.forms["loginForm"]["password"].value;
    if(validateClientSide(email) == false){
        return false;
    }
    if(validateClientSide(password) == false){
        return false;
    }
}

/**
 * This method validates the form on create.php 
 */
function validateCreate(){
    var textInputs = [
        email = document.forms["createForm"]["email"].value,
        password = document.forms["createForm"]["password"].value,
        fname = document.forms["createForm"]["fname"].value,
        lname = document.forms["createForm"]["lname"].value
    ];
    var numberInputs = [
       wallet = document.forms["createForm"]["wallet"].value
    ];
    textInputs.forEach(validateClientSide());
    numberInputs.forEach(validateNumericOnly());
}

/**
 * This method validates any input to be a number only
 * 
 * @param anInput
 * 
 * @return boolean //false if something is not a number
 */
function validateNumericOnly(anInput){
    if(/^?[0-9]*$/.test(anInput) == true){
        document.getElementById("inputErrors").innerHTML = "Invalid Input";
        return false;
    }
}