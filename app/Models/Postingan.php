<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postingan extends Model
{
    use HasFactory;
    protected $table = 'postingans';
    protected $fillable = ['id', 'created_at', 'account_id', 'caption', 'type', 'path_src'];

    static function addNewData($account_id, $caption, $type, $path_src){
        return Postingan::create([
            'account_id' => $account_id,
            'caption' => $caption,
            'type' => $type,
            'path_src' => $path_src

        ]);
    }

    static function addNewSampleData(){
        return Postingan::addNewData('4', 'ader ty', 'photo', 'postingan/tes8.png');
    }

    static function getAllData($column, $keywords){
        return Postingan::where($column, "=", $keywords)->get();
    }

    static function getAllFollowerPostinganIncludedHimSelf($account_id){
        return Postingan::join('followers', 'postingans.account_id', '=', 'followers.follower_id')
            ->join('accounts', 'postingans.account_id', '=', 'accounts.id')
            ->select('postingans.account_id', 'postingans.caption', 'postingans.path_src', 'accounts.username')
            ->where('followers.member_id', '=', $account_id)
            ->get();     
    }

}
