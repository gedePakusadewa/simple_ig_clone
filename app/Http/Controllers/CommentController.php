<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommentReply;
use App\Models\Account;

class CommentController extends Controller
{
    public function setNewCommentData(Request $request, $username){
        $userId = Account::getOneData("username", $username)->id;
        $postinganId = $request->input('postingan_id');
        $comment = $request->input('comment');
        CommentReply::addNewData($userId, $postinganId, $comment, null);
        return redirect()->route('home_timeline_page');

        // $tes2 = CommentReply::getLastCommnent(6);
        // dd($tes2 );
    }
}
