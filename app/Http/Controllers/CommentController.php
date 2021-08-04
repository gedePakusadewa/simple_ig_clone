<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommentReply;
use App\Models\Account;

class CommentController extends Controller
{

    public function __construct(Account $account, CommentReply $commentReply){
        $this->account = $account;
        $this->commentReply = $commentReply;
    }

    public function setNewCommentData(Request $request, $username){
        $userId = $this->account::where('username', $username)->first();
        $postinganId = $request->input('postingan_id');
        $comment = $request->input('comment');
        $this->commentReply::create([
            'account_id' => $userId->id,
            'postingan_id' => $postinganId,
            'comment' => $comment
        ]);
        // CommentReply::addNewData($userId, $postinganId, $comment, null);
        return redirect()->route('home_timeline_page');

    }
}
