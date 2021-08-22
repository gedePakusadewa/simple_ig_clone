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

    static function getAllDataLiterally(){
        return Postingan::get();
    }

    public function scopeGetAllFollowerPostinganIncludedHimSelf($query, $account_id){
        return $query->select('postingans.created_at', 'postingans.id', 'postingans.account_id', 'postingans.caption', 'postingans.path_src', 'accounts.username', 'accounts.selfie_path')->join('followers', 'postingans.account_id', '=', 'followers.follower_id')
        ->join('accounts', 'postingans.account_id', '=', 'accounts.id')
        ->where('followers.member_id', '=', $account_id);
    }

    static function getTotalNumberPostinganFromOneID($id){
        return Postingan::where('account_id', '=', $id)->count();
    }

    public function scopeGetEveryPostUploadedByOneID($query, $account_id){
        return $query->select('postingans.id', 'postingans.account_id', 'postingans.caption', 'postingans.path_src', 'accounts.username', Postingan::raw('COUNT(likeds.id) as totalLiked'))
                ->join('accounts', 'postingans.account_id', '=', 'accounts.id')
                ->leftJoin('likeds', 'postingans.id', '=', 'likeds.postingan_id')
                ->where('postingans.account_id', '=', $account_id)
                ->groupBy('postingans.id', 'accounts.username');
    }

    public function account(){
        return $this->belongsTo(Account::class, 'id');
    }

    // static function getAllFollowerPostinganIncludedHimSelf($account_id){
    //     return Postingan::join('followers', 'postingans.account_id', '=', 'followers.follower_id')
    //         ->join('accounts', 'postingans.account_id', '=', 'accounts.id')
    //         ->select('postingans.created_at', 'postingans.id', 'postingans.account_id', 'postingans.caption', 'postingans.path_src', 'accounts.username', 'accounts.selfie_path')
    //         ->where('followers.member_id', '=', $account_id)
    //         ->get();     
    // }

    // static function getEveryPostUploadedByOneID($account_id){
    //     return Postingan::select('postingans.id', 'postingans.account_id', 'postingans.caption', 'postingans.path_src', 'accounts.username', Postingan::raw('COUNT(likeds.id) as totalLiked'))
    //         ->join('accounts', 'postingans.account_id', '=', 'accounts.id')
    //         ->leftJoin('likeds', 'postingans.id', '=', 'likeds.postingan_id')
    //         ->where('postingans.account_id', '=', $account_id)
    //         ->groupBy('postingans.id', 'accounts.username')
    //         ->get();
    // }




}
