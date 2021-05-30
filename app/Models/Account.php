<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $table = 'accounts';
    protected $fillable = ['id', 'created_at', 'username', 'password', 'phone_number', 'email', 'full_name', 'selfie_path', 'status'];


    static function addNewData($username, $password, $phone_number, $email, $full_name, $selfie_path, $status){
        return Account::create([
            'username' => $username, 
            'password'  => $password, 
            'phone_number' => $phone_number, 
            'email'  => $email, 
            'full_name' => $full_name, 
            'selfie_path'  => $selfie_path, 
            'status'  => $status
        ]);
    }

    static function addSampleData(){
        return Account::addNewData('werta', '1234asdf', '-', 'wwf@gmail.com', '-', '-', '-');
    }

    static function getOneData($column, $keywords){
        return Account::where($column, "=", $keywords)->first();
    }

    static function getAccountSearchResult($keyword){
        return Account::where('username', 'LIKE', '%'.$keyword.'%')
                ->orWhere('full_name', 'LIKE', '%'.$keyword.'%')
                ->get();
    }

    static function getLimitedData($numberRow){
        return Account::limit($numberRow)->get();
    }
}
