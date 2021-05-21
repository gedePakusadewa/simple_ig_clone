<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    use HasFactory;
    protected $table = 'followers';
    protected $fillable = ['id', 'created_at', 'member_id', 'follower_id'];

    static function addNewData($member_id, $follower_id){
        return Follower::create([
            'member_id' => $member_id,
            'follower_id' => $follower_id
        ]);
    }

    static function addNewSampleData(){
        Follower::addNewData('2', '2');
        Follower::addNewData('3', '3');
        Follower::addNewData('4', '4');
        Follower::addNewData('5', '5');
    } 
    
    static function getAllIdFollower($account_id){
        return Follower::where('id', '=', $account_id)->get();
    }

    static function getTotalNumberFollowingFromOneID($id){
        return Follower::where('member_id', '=', $id)->count() - 1;
    }

    static function getTotalNumberFollowerFromOneID($id){
        return Follower::where('follower_id', '=', $id)->count() - 1;
    }

}
