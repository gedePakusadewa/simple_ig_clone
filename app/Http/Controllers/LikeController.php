<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Liked;

class LikeController extends Controller
{

    public function __construct(Liked $liked){
        $this->liked = $liked;
    } 

    public function setNewDataLike(Request $request, $account_name, $idPostingan){
        // if(Liked::checkPostinganIsLikedByAccount($idPostingan, session('account_id'))){
        //     Liked::deleteLikedDataByAccount($idPostingan, session('account_id'));
        // }else{
        //     Liked::setNewData($idPostingan, session('account_id'));
        // }
        $postingan = $this->liked::where('postingan_id', '=',$idPostingan);
        if($postingan->exists()){
            $postingan->delete();
        }else{
            $this->liked::create(['postingan_id'=> $idPostingan, 'account_id'=>session('account_id')]);
        }

        
        // $tes = ($this->liked::where('postingan_id', '=',$idPostingan)->delete());
        // dd($tes);
        return redirect()->route('home_timeline_page');
        //var_dump(Liked::checkPostinganIsLikedByAccount(9,2));
    }
}
