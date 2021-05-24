<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postingan;
use App\Models\Follower;
use Illuminate\Support\Str;
use App\Http\Traits\UsersSessionTrait;
use Illuminate\Support\Facades\Cookie;

class TimelineController extends Controller
{
    use UsersSessionTrait;

    public function getHomeTimelinePage(Request $request){
        //var_dump(Postingan::getAllFollowerPostinganIncludedHimSelf(6));
        //Follower::addNewSampleData();
        if($this->isSessionExists($request, 'account_username')){
            $data = Postingan::getAllFollowerPostinganIncludedHimSelf(intval(session('account_id')));
            return view('timeline.home-timeline-page', ['data' => $this->getHowLongUploadedVideo($data)]);
        }else{
            return redirect()->route('login_page');
        }

        //return $this->setExpiredCookie();

    }

    private function setExpiredCookie(){
        Cookie::expire('tes1');
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
