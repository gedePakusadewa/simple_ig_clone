<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postingan;
use App\Models\Follower;

class ProfileController extends Controller
{
    public function getProfilePage(){
        return view('profile.home-profile-page', [
            'totalPost' => Postingan::getTotalNumberPostinganFromOneID(intval(session('account_id'))), 
            'totalFollowing' => Follower::getTotalNumberFollowingFromOneID(intval(session('account_id'))), 
            'totalFollower' => Follower::getTotalNumberFollowerFromOneID(intval(session('account_id'))),
            'dataPostingan' => Postingan::getEveryPostUploadedByOneID(intval(session('account_id')))
            ]);
    }
    
}
