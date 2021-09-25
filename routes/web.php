<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\LikeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', function () {
    return redirect()->route('login_page');
});

//next alih engken carane ngai ilter untuk membedakan phone_number, email, atao username cari di web IG
//next terapkan validation care di laravel, kuala pelajin malu pank sink pelih dan mubazir nganggone
Route::get('/', 'App\Http\Controllers\AccountController@getLogInPage')->name('login_page');

Route::get('/get-search-result', [DataController::class, 'getDataSearchResutl']);

Route::prefix('account')->group(function(){
    Route::post('verify-login', 'App\Http\Controllers\AccountController@verifyLogInData')->name('verify_login');
    Route::get('process-login', [AccountController::class, 'processSpecialLogin'])->name('special_login');
    Route::get('reset-session', 'App\Http\Controllers\AccountController@resetSession')->name('reset_session');
    Route::get('edit', 'App\Http\Controllers\AccountController@getUpdateAccountPage')->name('updt_account_pge');
    Route::get('log-out', 'App\Http\Controllers\AccountController@getLogOut')->name('logout');
    Route::get('sign-up-page', [AccountController::class, 'getSignUpPage'])->name('sign_up_page');

    //validate login untuk validati email belum bisa, regex hanya bisa di JS, dan error di server side
    Route::post('validate-and-save-account', [AccountController::class, 'setNewDataAccount'])->name('validate_and_save_account');

    Route::get('/switch-account', [AccountController::class, 'getSwitchAccountPage'])->name('switch_account_page');
});

Route::prefix('timeline')->group(function(){
    Route::get('/', 'App\Http\Controllers\TimelineController@getHomeTimelinePage')->name('home_timeline_page');

});

Route::prefix('explore')->group(function(){
    Route::get('/', 'App\Http\Controllers\ExploreController@getHomeExplore')->name('home_explore_page');
    Route::post('account-search-result', 'App\Http\Controllers\ExploreController@getAccountSearchResult')->name('account_search_rslt');

});

Route::group(['prefix' => '{account_name}'], function(){
    Route::get('/', 'App\Http\Controllers\ProfileController@getProfilePage')->name('profile_page');
    Route::get('upload-post', 'App\Http\Controllers\UploadController@getUploadPage')->name('upload_pg');
    Route::post('validate-and-save-post', 'App\Http\Controllers\UploadController@setNewPostdata')->name('validate_save_post');
    Route::get('save-like-postingan/{idPostingan}', 'App\Http\Controllers\LikeController@setNewDataLike')->name('add_liked_dta');
    Route::post('save-comment-postingan/{idPostingan}', [CommentController::class, 'setNewDataComment'])->name('save_comment_post');
    Route::get('saved', [ProfileController::class, 'getSavedPage'])->name('saved_post');
    Route::post('save-comment', [CommentController::class, 'setNewCommentData'])->name('save_comment');

    //--------------ajax-----------------
    Route::post('set-unset-like/{id_postingan}', [LikeController::class, 'ajax_set_unset_like'])->name('ajax_set_unset_like');
    Route::get('set-follow-unfollow/{id_user_to_be_followed}', [ProfileController::class, 'ajax_set_follow_unfollow'])->name('ajax_set_follow_unfollow');
});

Route::middleware('optimizeImages')->group(function () {
    // all images will be optimized automatically
    Route::post('validate-and-save-post', 'App\Http\Controllers\UploadController@setNewPostdata')->name('validate_save_post_img');
});

Route::prefix('direct')->group(function (){
    Route::get('inbox', [InboxController::class, 'getHomeInboxPage'])->name('home_inbox_page');
});

// Route::fallback(function(){
// 	//https://laravel.com/docs/8.x/routing#fallback-routes
// 	return redirect()->route('login_page');
//     //selanjutne tentukan kla nganggo error page ato dialihkan kehalaman tertentu gen untuk fallback function
// });