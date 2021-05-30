<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Postingan;

class ExploreController extends Controller
{
    public function getHomeExplore(){
        return view('explore.home-explore-page', ['exploreData' => Postingan::getAllDataLiterally()]);
    }

    public function getAccountSearchResult(Request $request){
        $keyword = $request->input('keyword');
        // var_dump(Account::getSearchResult($keyword));
        // foreach(Account::getSearchResult($keyword) as $item){
        //     echo $item->username."<br />";
        // }
        return view('explore.tmp-search-result', ['searchResult' => Account::getAccountSearchResult($keyword)]);
    }
}
