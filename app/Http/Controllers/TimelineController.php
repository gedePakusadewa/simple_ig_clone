<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postingan;
use App\Models\Follower;
use Illuminate\Support\Str;

class TimelineController extends Controller
{
    public function getHomeTimelinePage(){
        //var_dump(Postingan::getAllFollowerPostinganIncludedHimSelf(6));
        //Follower::addNewSampleData();
        $data = Postingan::getAllFollowerPostinganIncludedHimSelf(intval(session('account_id')));
        return view('timeline.home-timeline-page', ['data' => $this->getHowLongUploadedVideo($data)]);
    }

    private function getHowLongUploadedVideo($data){
        foreach($data as $item){
            $totalDuration = \Carbon\Carbon::now()->diffForHumans($item->created_at);

            //https://stackoverflow.com/questions/40171556/how-to-add-new-value-in-collection-laravel
            $item->when_its_uploaded =  Str::of($totalDuration)->replace('after', 'ago');
        } 
        return $data;
    }


    
}
