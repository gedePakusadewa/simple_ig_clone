<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CookieIdUser extends Model
{
    use HasFactory;
    protected $table = 'cookie_id_users';
    protected $fillable = ['id', 'created_at', 'user_id', 'cookie_value'];

    static function setNewData($user_id, $cookie_value){
        return CookieIdUser::create([
            'user_id' => $user_id,
            'cookie_value' => $cookie_value
        ]);
    }

    static function getSingleData($column, $value){
        return CookieIdUser::where($column, '=', $value)->first();
    }

    static function deleteSingleData($column, $value){
        return CookieIdUser::where($column, '=', $value)->delete();
    }


}
