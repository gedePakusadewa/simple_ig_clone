<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function getProfilePage(){
        return view('profile.home-profile-page');
    }
}
