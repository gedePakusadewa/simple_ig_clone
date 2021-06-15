<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account1 extends Model
{
    use HasFactory;
    protected $table = 'account1s';
    protected $fillable = ['id', 'created_at', 'password', 'phone_number', 'email', 'fullname'];

    static function addNewData($password, $phone_number, $email, $full_name){
        return Account1::create([
            'password'  => $password, 
            'phone_number' => $phone_number, 
            'email'  => $email, 
            'fullname' => $full_name
        ]);
    }

    static function addNewDataWithDefaultValue($email, $full_name){
        return Account1::create([
            'email'  => $email, 
            'fullname' => $full_name
        ]);
    }

    static function addSampleData(){
        Account1::addNewDataWithDefaultValue('wwf@gmail.com', 'wertaq');
    }

}
