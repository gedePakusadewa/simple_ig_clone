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

    public function ajax_set_comment(Request $request){
        try {
            $this_user_id = session('account_id');
            $postinganId = $request->input('postingan_id');
            $comment = $request->input('comment');
            $this->commentReply::create([
                'account_id' => $this_user_id,
                'postingan_id' => $postinganId,
                'comment' => $comment
            ]);
           
            $number_comment = $this->commentReply::where('account_id', $this_user_id ) ->where('postingan_id', $postinganId)->count()-2;
            $lastest_comment = $this->commentReply::latest()->first();
            $lastest_account_commented = $this->account::where('id', $lastest_comment->account_id)->first();
            
            return response()->json(['message'=>'success', 'total_comment'=>$number_comment, 'latest_comment'=>$lastest_comment->comment, 'latest_account'=>$lastest_account_commented->username], 200);
          }catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
          }
    }

}
