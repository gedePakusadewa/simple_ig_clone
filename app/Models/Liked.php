<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liked extends Model
{
    use HasFactory;
    protected $table = 'likeds';
    protected $fillable = ['id', 'created_at', 'postingan_id', 'account_id'];

    static function setNewData($postingan_id, $account_id){
        return Liked::create([
            'postingan_id' => $postingan_id,
            'account_id' => $account_id
        ]);
    }

    static function getTotalLikeForEachPostinganBasedOnOneID($id){
        return Liked::join('followers', 'postingans.account_id', '=', 'followers.follower_id')
            ->join('accounts', 'postingans.account_id', '=', 'accounts.id')
            ->select('postingans.id', 'postingans.account_id', 'postingans.caption', 'postingans.path_src', 'accounts.username')
            ->where('followers.member_id', '=', $account_id)
            ->get(); 
    }

    static function getTotalPostinganLikedPerId($postinganId){
        return Liked::where('postingan_id', '=', $postinganId)->count();
    }

    static function getPostinganIdLikedByAccount($account_id){
        return Liked::where('account_id', '=', $account_id)->get();
    }

    static function checkPostinganIsLikedByAccount($postingan_id, $account_id){
        return Liked::where('postingan_id', '=', $postingan_id)
        ->where('account_id', '=', $account_id)
        ->exists();
    }

    static function deleteLikedDataByAccount($postingan_id, $account_id){
        return Liked::where('postingan_id', '=', $postingan_id)
        ->where('account_id', '=', $account_id)
        ->delete();
    }

    
}
