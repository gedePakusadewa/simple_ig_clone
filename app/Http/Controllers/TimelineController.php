<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postingan;
use App\Models\Follower;

class TimelineController extends Controller
{
    public function getHomeTimelinePage(){
        //var_dump(Postingan::getAllFollowerPostinganIncludedHimSelf(6));
        //Follower::addNewSampleData();
        return view('timeline.home-timeline-page', ['data' => Postingan::getAllFollowerPostinganIncludedHimSelf(intval(session('account_id')))]);
    }

    private function getAllPostingan(){
        // $listFriends = Follower:getAllIdFollower(intval(session('account_id')));


        // foreach($listFriends as $data){

        // }

    }
}
