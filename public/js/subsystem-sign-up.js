"use strict";

var alertEmail = document.getElementById("alert-email");
var alertFullName = document.getElementById("alert-fullname");
var alertUsername = document.getElementById("alert-username");
var alertPassword = document.getElementById("alert-password");

alertEmail.style.display = "none";
alertFullName.style.display = "none";
alertUsername.style.display = "none";
alertPassword.style.display = "none";

function validateInputDataSignUpForm(){

    var statusEmail = isEmailValid("signUpForm", "email");
    alertEmail.style.display = (statusEmail === false) ? "block" : "none";

    var statusFullname = isFullNameValid("signUpForm", "fullname");
    alertFullName.style.display = (statusFullname === false) ? "block" : "none";

    var status_username = isUsernameValid("signUpForm", "username");
    alertUsername.style.display = (status_username === false) ? "block" : "none";

    var status_password = isPasswordValid("signUpForm", "pwd");
    alertPassword.style.display = (status_password === false) ? "block" : "none";

    if((statusEmail === true) && (statusFullname === true) &&(status_username === true) && (status_password === true)){
        return true;
    }else{
        return false;
    }
} 

function isEmailValid(formName, inputEmail){
    //SC: https://www.w3resource.com/javascript/form/email-validation.php
    var regexFormat= /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    return regexFormat.test(document.forms[formName][inputEmail].value);
}

function isFullNameValid(formName, inputName){
    var regexFormat= /^[a-zA-Z ]{1,240}$/;
    return regexFormat.test(document.forms[formName][inputName].value);
}

function isPasswordValid(formName, idPassword){
    //Minimum four characters, at least one letter and one number:
    //SC: https://stackoverflow.com/questions/19605150/regex-for-password-must-contain-at-least-eight-characters-at-least-one-number-a

    var password_regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{4,}$/;
    return password_regex.test(document.forms[formName][idPassword].value);
}

function isUsernameValid(formName, idName){
    //Things allowed: alphabets, presumably numbers, the last character must not a number
    //SC: https://stackoverflow.com/questions/42082681/regex-validation-for-description-box

    //var regex_username = /^[a-zA-Z0-9]{5,}[a-zA-Z]+[0-9]*$/;
    
    //things allowed: alphabets, number, or both, minimal 5 characters.
    var regex_username = /^[a-zA-Z0-9]{5,}[a-zA-Z]+[0-9]*$/;
    return regex_username.test(document.forms[formName][idName].value);
}