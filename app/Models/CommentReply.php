<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    use HasFactory;
    protected $table = 'comment_replies';
    protected $fillable = ['id', 'created_at', 'account_id', 'postingan_id', 'comment', 'parent_chat_id'];

    static function addNewData($account_id, $postingan_id, $comment, $parent_chat_id){
        return CommentReply::create([
            'account_id' => $account_id, 
            'postingan_id'  => $postingan_id, 
            'comment' => $comment, 
            'parent_chat_id'  => $parent_chat_id
        ]);
    }

    public function scopeGetLastComment($query, $postinganId){
        return $query->where('postingan_id', '=', $postinganId)
            ->limit(1)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function scopeGetTotalNumberOfComment($query, $postinganId){
        return $query->where('postingan_id', '=', $postinganId)->count();
    }

    // static function addSampleData(){
    //     return CommentReply::addNewData('werta', '1234asdf', '-', 'wwf@gmail.com', '-', '-', '-');
    // }

    // static function getLastComment($postinganId){
    //     return CommentReply::where('postingan_id', '=', $postinganId)
    //         ->limit(1)
    //         ->orderBy('id', 'desc')
    //         ->get();
    // }

    // static function getTotalNumberOfComment($postinganId){
    //     return CommentReply::where('postingan_id', '=', $postinganId)->count();
    // }

    


}
