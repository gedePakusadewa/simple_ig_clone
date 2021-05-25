<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InboxController extends Controller
{
    public function getHomeInboxPage(){
        return view('direct.home-inbox-page');
    }
}
