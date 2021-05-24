<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use App\Models\Account;

trait InputValidationTrait {

    public function isUsernameExist($username){
        $data = Account::getOneData('username', $username);
        return $data !== null ? true : false;
    }

    public function isPasswordExist($pwd){
        $data = Account::getOneData('password', $pwd);
        return $data !== null ? true : false;
    }

    public function filterBasicInput($input){
        //source: https://www.w3schools.com/php/php_form_validation.asp
        
        $data = htmlspecialchars($input);
        $data = trim($data);
        $data = stripslashes($data);

        return $data;
    }

    public function isUsernameFormatValid($data){
        //Things allowed: alphabets, presumably numbers, the last character must not a number
        //SC: https://stackoverflow.com/questions/42082681/regex-validation-for-description-box
        //things allowed: alphabets, number, or both, minimal 5 characters.
        return (!preg_match('/^[a-zA-Z0-9]{5,}[a-zA-Z]+[0-9]*$/', $data)) ? false : true;
    }

    public function isPasswordFormatValid($data){
        //Minimum four characters, at least one letter and one number:
        //SC: https://stackoverflow.com/questions/19605150/regex-for-password-must-contain-at-least-eight-characters-at-least-one-number-a
        return (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{4,}$/', $data)) ? false : true;
    }


    public function isFullNameFormatValid($data){
        return (!preg_match('/^[a-zA-Z ]{1,240}$/', $data)) ? false : true;
    }

    public function isEmailFormatValid($data){
        //SC: https://www.w3resource.com/javascript/form/email-validation.php
        return (!preg_match("/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/", $data)) ? false : true;
    }

}
