function validateLogin(){
    var email = document.forms["loginForm"]["email"].value;
    var password = document.forms["loginForm"]["password"].value;
    if(/<|>|;|(|)/.test(email) == true || email == ""){
        document.getElementById("errors").innerHTML = "Invalid Input";
        document.forms["loginForm"]["email"].focus();
        return false;
    }
    if(/<|>|;|(|)/.test(password) == true || password == ""){
        document.getElementById("errors").innerHTML = "Invalid Input";
        document.forms["loginForm"]["password"].focus();
        return false;
    }
}

function validateCreate(){

}

function regexForm(){

}