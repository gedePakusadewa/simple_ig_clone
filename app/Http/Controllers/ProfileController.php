<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postingan;
use App\Models\Follower;
use App\Models\Account;

class ProfileController extends Controller
{
    public function getProfilePage($username){
        $accountData = Account::getOneData('username', $username);
        $id = $accountData->id;
        return view('profile.home-profile-page', [
            'totalPost' => Postingan::getTotalNumberPostinganFromOneID($id), 
            'totalFollowing' => Follower::getTotalNumberFollowingFromOneID($id), 
            'totalFollower' => Follower::getTotalNumberFollowerFromOneID($id),
            'dataPostingan' => Postingan::getEveryPostUploadedByOneID($id),
            'accountData' => $accountData
            ]);
    }

    public function getSavedPage(){
        //return view('profile.saved');
        return view('announcement.under-development', ['pageName' => 'Saved']);
    }
}
