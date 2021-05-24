<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postingan;
use Illuminate\Support\Facades\Storage;
use ImageOptimizer;

class UploadController extends Controller
{   
    
    public function getUploadPage(){
        return view('upload_post.form-upload-page');
    }

    public function setNewPostData(Request $request){
        $caption = $request->input('captionUpload');
        $account_id = session('account_id');
        $file = $request->file('filePost');
        Postingan::addNewData($account_id, $caption, 'photo', $file->store('img-post', 'public'));
        //ImageOptimizer::optimize('/postingan/tes123.jpg);
        //echo "<img src='".asset('storage/img-post/Aa8QJRXW17vPz1FjxwKh76bkUYUoG70kx9ZH8jV4.jpg')."' />";
        return redirect()->route('home_timeline_page');
    }
}
