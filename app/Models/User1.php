<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User1 extends Model
{
    use HasFactory;
    protected $table = 'user1s';
    protected $fillable = ['id', 'created_at', 'account_id', 'username', 'profile_path', 'status'];

    static function addNewData($account_id, $username, $profile_path, $status){
        return User1::create([
            'account_id'  => $account_id, 
            'username' => $username, 
            'profile_path'  => $profile_path, 
            'status' => $status
        ]);
    }

    static function addNewDataWithDefaultValue($account_id, $username, $status){
        return User1::create([
            'account_id'  => $account_id, 
            'username' => $username, 
            'status' => $status
        ]);
    }

    static function addSampleData(){
        User1::addNewDataWithDefaultValue('2', 'kapout', null);
        User1::addNewDataWithDefaultValue('3', 'uponipo', null);
        User1::addNewDataWithDefaultValue('4', 'yuyutu', null);
        User1::addNewDataWithDefaultValue('5', 'wertaq', null);
    }
}
