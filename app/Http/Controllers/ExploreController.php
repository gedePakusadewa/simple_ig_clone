<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function getHomeExplore(){
        return view('explore.home-explore-page');
    }
}
