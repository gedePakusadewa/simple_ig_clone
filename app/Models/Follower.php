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
        Follower::addNewData('1', '1');
        // Follower::addNewData('1', '3');
        // Follower::addNewData('1', '5');
    } 
    
    static function getAllIdFollower($account_id){
        return Follower::where('id', '=', $account_id)->get();
    }

}
