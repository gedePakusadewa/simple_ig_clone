<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('login_page');
});

Route::prefix('account')->group(function(){
    Route::get('login', 'App\Http\Controllers\AccountController@getLogInPage')->name('login_page');
    Route::post('verify-login', 'App\Http\Controllers\AccountController@verifyLogInData')->name('verify_login');
    Route::get('reset-session', 'App\Http\Controllers\AccountController@resetSession')->name('reset_session');
    Route::get('edit', 'App\Http\Controllers\AccountController@getUpdateAccountPage')->name('updt_account_pge');
    Route::get('log-out', 'App\Http\Controllers\AccountController@getLogOut')->name('logout');
});

Route::prefix('timeline')->group(function(){
    Route::get('/', 'App\Http\Controllers\TimelineController@getHomeTimelinePage')->name('home_timeline_page');

});

Route::prefix('explore')->group(function(){
    Route::get('explore', 'App\Http\Controllers\ExploreController@getHomeExplore')->name('home_explore_page');
    Route::post('account-search-result', 'App\Http\Controllers\ExploreController@getAccountSearchResult')->name('account_search_rslt');

});

// Route::prefix('upload-post')->group(function(){
//     Route::get('upload-page', 'App\Http\Controllers\UploadController@getUploadPage')->name('upload_page');

// });

Route::group(['prefix' => '{account_name}'], function(){
    Route::get('/', 'App\Http\Controllers\ProfileController@getProfilePage')->name('profile_page');
    Route::get('upload-post', 'App\Http\Controllers\UploadController@getUploadPage')->name('upload_pg');
    Route::post('validate-and-save-post', 'App\Http\Controllers\UploadController@setNewPostdata')->name('validate_save_post');
    Route::get('save-like-postingan/{idPostingan}', 'App\Http\Controllers\LikeController@setNewDataLike')->name('add_liked_dta');
});


Route::fallback(function(){
	//https://laravel.com/docs/8.x/routing#fallback-routes
	return redirect()->route('login_page');
    //selanjutne tentukan kla nganggo error page ato dialihkan kehalaman tertentu gen untuk fallback function
});