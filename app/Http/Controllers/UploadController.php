<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postingan;
use Illuminate\Support\Facades\Storage;
use ImageOptimizer;

use Intervention\Image\ImageManager;

class UploadController extends Controller
{   
    
    public function getUploadPage(){
        return view('upload_post.form-upload-page');
    }

    public function setNewPostData(Request $request){
        $caption = $request->input('captionUpload');
        $account_id = session('account_id');
        $file = $request->file('filePost');

        // src=> https://stackoverflow.com/questions/44577380/how-to-upload-files-in-laravel-directly-into-public-folder

        $path_img = $file->store('', ['disk' => 'my_public']);

        // dd($path_img);

        Postingan::addNewData($account_id, $caption, 'photo', $path_img);

        // create an image manager instance with favored driver
        $manager = new ImageManager(array('driver' => 'gd'));


        // http://image.intervention.io/getting_started/installation#laravel
        // https://artisansweb.net/how-to-upload-and-crop-image-in-laravel-using-imgareaselect-intervention-image-library/

        // to finally create image instances
        $image = $manager->make('img-post/'.$path_img)->resize(600, 400);
        $image->save();
        // $image->store('', ['disk' => 'my_public']);

        //ImageOptimizer::optimize('/postingan/tes123.jpg);
        //echo "<img src='".asset('storage/img-post/Aa8QJRXW17vPz1FjxwKh76bkUYUoG70kx9ZH8jV4.jpg')."' />";

        return redirect()->route('home_timeline_page');
        // return $image->response('jpg');
    }
}
