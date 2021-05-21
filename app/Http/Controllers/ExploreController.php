<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class ExploreController extends Controller
{
    public function getHomeExplore(){
        return view('explore.home-explore-page');
    }

    public function getAccountSearchResult(Request $request){
        $keyword = $request->input('keyword');
        // var_dump(Account::getSearchResult($keyword));
        // foreach(Account::getSearchResult($keyword) as $item){
        //     echo $item->username."<br />";
        // }
        return view('explore.home-explore-page', ['searchResult' => Account::   ($keyword)]);
    }
}
