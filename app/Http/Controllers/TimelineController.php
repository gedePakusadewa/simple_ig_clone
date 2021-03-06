<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postingan;
use App\Models\Follower;
use App\Models\Account;
use App\Models\Account1;
use App\Models\User1;
use App\Models\Liked;
use Illuminate\Support\Str;
use App\Http\Traits\UsersSessionTrait;
use Illuminate\Support\Facades\Cookie;
use App\Http\Traits\CookieTrait;
use App\Models\CommentReply;

class TimelineController extends Controller
{
    use UsersSessionTrait;
    use CookieTrait;

    public function __construct(Liked $liked, Postingan $postingan, CommentReply $commentReply, Account $account){
        $this->liked = $liked;
        $this->postingan = $postingan;
        $this->commentReply = $commentReply;
        $this->account = $account;
    }

    public function getHomeTimelinePage(Request $request){
          
        //Follower::addNewSampleData();
        if($this->isSessionExists($request, 'account_username')){
            // $data = Postingan::getAllFollowerPostinganIncludedHimSelf(intval(session('account_id')));
            $data = $this->postingan::getAllFollowerPostinganIncludedHimSelf(intval(session('account_id')))->get();
            $data = $this->getWhatPostinganIdAccountLiked($data);
            $data = $this->getTotaLikedForOnePostinganId($data);
            $data = $this->getOneLastCommentPerPostingan($data);
            return view('timeline.home-timeline-page', ['data' => $this->getHowLongUploadedVideo($data), 'userData' => $this->account::getOneData('id', intval(session('account_id'))), 'suggestionData' => $this->account::getLimitedData(5)]);
        }else{
            return redirect()->route('login_page');
        }


        // Account::addNewData();

        // $data = Postingan::getAllFollowerPostinganIncludedHimSelf(1);
        // dd($this->getOneLastCommentPerPostingan($data));
    }

    private function getHowLongUploadedVideo($data){
        foreach($data as $item){
            $totalDuration = \Carbon\Carbon::now()->diffForHumans($item->created_at);

            //https://stackoverflow.com/questions/40171556/how-to-add-new-value-in-collection-laravel
            $item->when_its_uploaded =  Str::of($totalDuration)->replace('after', 'ago');
        } 
        return $data;
    }

    //i use this approach that adding another table result after join three tables before because i dont really sure i can join 4 or more table. This will be my next fix
    private function getWhatPostinganIdAccountLiked($data){
        // $dtaLiked = Liked::getPostinganIdLikedByAccount(session('account_id'));
        $dtaLiked = $this->liked::getPostinganIdLikedByAccount(session('account_id'));
        foreach($data as $item){
            $item->alreadyLiked = $dtaLiked->contains('postingan_id', $item->id) ? true : false;
        } 
       return $data;
    }

    private function getTotaLikedForOnePostinganId($data){
        foreach($data as $item){
            // $item->totalLiked = Liked::getTotalPostinganLikedPerId($item->id);
            $item->totalLiked = $this->liked::getTotalPostinganLikedPerId($item->id);
        } 
       return $data;
    }

  private function getOneLastCommentPerPostingan($data){
    $incre = 0;
    foreach($data as $item){
    //   $dta = CommentReply::getLastCommnent($item->id);
      $dta = $this->commentReply::getLastComment($item->id);
      if($dta->isNotEmpty()){
        $totalComment = $this->commentReply::getTotalNumberOfComment($item->id);
        //$tes = $dta->account_id;
        $userThatComment = $this->account::getOneData('id', $dta[0]->account_id);
        $item->oneLastComment = $dta[0]->comment;
        $item->oneLastAccountComment = $userThatComment->username;
        $item->totalComment = $totalComment;
        //dd($dta[0]);
      }
      //echo $dta->account_id;
    } 
    return $data;
    //var_dump(CommentReply::getLastCommnent(6)->isNotEmpty());
  }
    
}
