<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Liked;

class LikeController extends Controller
{
    public function setNewDataLike(Request $request, $account_name, $idPostingan){
        if(Liked::checkPostinganIsLikedByAccount($idPostingan, session('account_id'))){
            Liked::deleteLikedDataByAccount($idPostingan, session('account_id'));
        }else{
            Liked::setNewData($idPostingan, session('account_id'));
        }
         
        return redirect()->route('home_timeline_page');
        //var_dump(Liked::checkPostinganIsLikedByAccount(9,2));
    }
}
