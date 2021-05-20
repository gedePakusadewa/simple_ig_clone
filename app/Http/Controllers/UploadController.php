<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postingan;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function getUploadPage(){
        return view('upload_post.form-upload-page');
    }

    public function setNewPostData(Request $request){
        $caption = $request->input('captionUpload');
        $account_id = session('account_id');
        $file = $request->file('filePost');

        //$post_name =  $account_id."_".time()."_".$file->getClientOriginalName();
        Postingan::addNewData($account_id, $caption, 'photo', $file->store('img-post', 'public'));
        return redirect()->route('home_timeline_page');
    }
}
