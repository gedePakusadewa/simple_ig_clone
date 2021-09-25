<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postingan;
use App\Models\Follower;
use App\Models\Account;

class ProfileController extends Controller
{

    public function __construct(Account $account, Postingan $postingan, Follower $follower){
        $this->account = $account;
        $this->postingan = $postingan;
        $this->follower = $follower;
    }

    public function getProfilePage($username){
        // $accountData = Account::getOneData('username', $username);
        $accountData = $this->account::where('username', $username)->first();
        // dd($accountData);
        $id = $accountData->id;

        $totalPost = $this->postingan::where('account_id', $id)->count();
        $totalFollowing = $this->follower::where('member_id', $id)->count()-1;
        $totalFollower = $this->follower::where('follower_id', $id)->count()-1;
        $isFollowed = $this->is_this_user_already_followed(session('account_id'), $id);

        if(session('account_id') === $id){
            $isFollowed = false;
        }
        // $dataPostingan = $this->postingan::where('');
        // dd($this->postingan::getEveryPostUploadedByOneID($id));
        return view('profile.home-profile-page', [
            'totalPost' => $totalPost, 
            'totalFollowing' => $totalFollowing, 
            'totalFollower' => $totalFollower,
            // 'dataPostingan' => Postingan::getEveryPostUploadedByOneID($id),
            'dataPostingan' => $this->postingan::getEveryPostUploadedByOneID($id)->get(),
            'accountData' => $accountData,
            'isFollowed' => $isFollowed
            ]);
    }

    public function getSavedPage(){
        //return view('profile.saved');
        return view('announcement.under-development', ['pageName' => 'Saved']);
    }

    public function ajax_set_follow_unfollow(Request $request, $username, $id_user_to_be_followed){
        try{
            $this_user_id = session('account_id');
            $is_delete_user = false;
            if(!$this->is_this_user_already_followed($this_user_id, $id_user_to_be_followed)){
                $this->follower::create([
                    'member_id' => $this_user_id,
                    'follower_id' => $id_user_to_be_followed
                ]);
            }else{
                $user = $this->follower::where('member_id', $this_user_id)->where('follower_id', $id_user_to_be_followed)->first();
                $user->delete();
                $is_delete_user = true;
            }
            return response()->json(['is_delete_user' => $is_delete_user], 200);
        }catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    private function is_this_user_already_followed($user_id, $id_user_to_be_followed){
        try{
            if($this->follower::where('member_id', $user_id)->where('follower_id', $id_user_to_be_followed)->exists()){
                return true;
            }else{
                return false;
            }
        }catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
