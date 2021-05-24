<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\CookiesLogInUser;
use App\Models\CookieIdUser;

trait CookieTrait {
    public function setCookies(){
        //generate unik code 32char
        //simpen di cookies a/n session_login
        //simpen di tabel a/n sessionLogInUser 
        /*id
        cookie_session_id
        
        */

        // $response = new Response('Hello World');
        // $response->withCookie(cookie('name', 'virat', 1));
        // return $response;

        // return response('Hello World')->cookie(
        //     'name', 'value', 1
        // );

        if($this->isCookieExistInClient() === false && $this->isCookieExistInServer() === false){
            $value = $this->generateRandomString(32);
            CookiesLogInUser::setNewData('cookie_id', $value);
            CookieIdUser::setNewData(session('account_id'), $value);
            Cookie::queue('cookie_id', $value, 1);
        }
    }

    public function setExpiredCookie(){
        Cookie::expire('cookie_id');
        CookiesLogInUser::deleteSingleData('cookie_value', Cookie::get('cookie_id'));
        CookieIdUser::deleteSingleData('cookie_value', Cookie::get('cookie_id'));
    }

    public function isCookieExistInClient(){
        return Cookie::get('cookie_id') !== null ? true :false;
    }

    public function isCookieExistInServer(){
        return CookiesLogInUser::getSingleData('cookie_value', Cookie::get('cookie_id')) !== null ? true : false;
    }

    public function isCookieExist(){
        return $this->isCookieExistInClient() && $this->isCookieExistInServer()  ? true : false;
    }

    public function generateRandomString($length = 32) {
        //https://stackoverflow.com/questions/4356289/php-random-string-generator
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function getIdUserFromCookie($cookie_value){
        $tmpData = CookieIdUser::getSingleData('cookie_value', $cookie_value);
        return $tmpData->user_id;
    }

    public function getCookieValue($cookieName){
        return Cookie::get($cookieName);
    }


}