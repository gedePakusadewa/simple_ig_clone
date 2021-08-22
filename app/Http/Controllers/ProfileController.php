<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postingan;
use App\Models\Follower;
use App\Models\Account;

class ProfileController extends Controller
{

    public function __construct(Account $account, Postingan $postingan, Follower $follower){
        $this->account = $account;
        $this->postingan = $postingan;
        $this->follower = $follower;
    }

    public function getProfilePage($username){
        // $accountData = Account::getOneData('username', $username);
        $accountData = $this->account::where('username', $username)->first();
        // dd($accountData);
        $id = $accountData->id;

        $totalPost = $this->postingan::where('account_id', $id)->count();
        $totalFollowing = $this->follower::where('member_id', $id)->count()-1;
        $totalFollower = $this->follower::where('follower_id', $id)->count()-1;
        // $dataPostingan = $this->postingan::where('');
        // dd($this->postingan::getEveryPostUploadedByOneID($id));
        return view('profile.home-profile-page', [
            'totalPost' => $totalPost, 
            'totalFollowing' => $totalFollowing, 
            'totalFollower' => $totalFollower,
            // 'dataPostingan' => Postingan::getEveryPostUploadedByOneID($id),
            'dataPostingan' => $this->postingan::getEveryPostUploadedByOneID($id)->get(),
            'accountData' => $accountData
            ]);
    }

    public function getSavedPage(){
        //return view('profile.saved');
        return view('announcement.under-development', ['pageName' => 'Saved']);
    }
}
