<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CookiesLogInUser extends Model
{
    use HasFactory;
    protected $table = 'cookies_log_in_users';
    protected $fillable = ['id', 'created_at', 'cookie_name', 'cookie_value'];

    static function getSingleData($column, $value){
        return CookiesLogInUser::where($column, '=', $value)->first();
    }

    static function setNewData($cookie_name, $cookie_value){
        return CookiesLogInUser::create([
            'cookie_name' => $cookie_name,
            'cookie_value' => $cookie_value
        ]);
    }

    static function deleteSingleData($column, $value){
        return CookiesLogInUser::where($column, '=', $value)->delete();
    }

}
