<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postingan;
use App\Models\Follower;
use App\Models\Account;
use App\Models\Account1;
use App\Models\User1;
use Illuminate\Support\Str;
use App\Http\Traits\UsersSessionTrait;
use Illuminate\Support\Facades\Cookie;
use App\Http\Traits\CookieTrait;

class TimelineController extends Controller
{
    use UsersSessionTrait;
    use CookieTrait;

    public function getHomeTimelinePage(Request $request){
        //var_dump(Postingan::getAllFollowerPostinganIncludedHimSelf(6));
        //Follower::addNewSampleData();
        //User1::addSampleData();
        if($this->isSessionExists($request, 'account_username')){
            $data = Postingan::getAllFollowerPostinganIncludedHimSelf(intval(session('account_id')));
            return view('timeline.home-timeline-page', ['data' => $this->getHowLongUploadedVideo($data), 'userData' => Account::getOneData('id', intval(session('account_id'))), 'suggestionData' => Account::getLimitedData(5)]);
        }else{
            return redirect()->route('login_page');
        }

        // echo $this->getIdUserFromCookie($this->getCookieValue(''));
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
