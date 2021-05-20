<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postingans;

class UploadController extends Controller
{
    public function getUploadPage(){
        return view('upload_post.form-upload-page');
    }

    public function setNewPostData(Request $request){
        $caption = $request->input('captionUpload');
        $account_id = session('account_id');
        $file = $request->file('filePost');

        $post_name =  $account_id."_".time()."_".$file->getClientOriginalName();

        echo $post_name;
        //Postingans::addNewData($account_id, $caption, $type, $path_src);
    }
}
