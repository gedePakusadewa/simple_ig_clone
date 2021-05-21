<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Liked;

class LikeController extends Controller
{
    public function setNewDataLike(Request $request, $account_name, $idPostingan){
        Liked::setNewData($idPostingan, session('account_id'));
        return redirect()->route('home_timeline_page');
    }
}
