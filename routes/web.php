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
    return view('welcome');
});
Route::group(['namespace'=>'Site','middleware'=>'auth','prefix'=>'site'],function (){
    Route::get('/', 'HomePage@index')->name('site');
    Route::get('logout', 'AuthController@logout')->name('site.logout');
});
//my bage
//Route::post('site/make_post', 'livewire@makePost')->name('make_post');
Route::group(['namespace'=>'Site','middleware'=>'auth','prefix'=>'site'],function (){
    Route::get('/my_page', 'Mypage@mypage')->name('mypage');
    Route::get('/EditProfile', 'Mypage@editprofile')->name('EditProfile');
    Route::post('/UpdateProfile', 'Mypage@updateprofile')->name('update_mypage');
    Route::post('/UpdatePhoto', 'Mypage@update_Personal_photo')->name('update_personalPhoto');
    Route::post('/UpdateCoverPhoto', 'Mypage@update_cover_photo')->name('update_coverPhoto');
    Route::get('/EditPassword', 'Mypage@editpassword')->name('update_password');
    Route::post('/updatePassword', 'Mypage@updatepassword')->name('edit_password');
    Route::get('/delete_post/{id}', 'Mypage@deletePost')->name('delete_post');
    Route::post('/update_post', 'Mypage@updatePost')->name('update_post');
    Route::post('/comment', 'Mypage@create_Comment')->name('createComment');
    Route::get('/delete_comment/{id}', 'Mypage@deleteComment')->name('delete_comment');
    Route::get('/friendAccept', 'Mypage@acceptFriend')->name('accept_friend');
    Route::get('/Accept/{id}', 'Mypage@accept')->name('accept');
    Route::get('/MyFriends', 'Mypage@MyFriends')->name('MyFriend');
    Route::get('/remove_friend/{id}', 'Mypage@remove_friend')->name('remove_friend');

    Route::get('/ddd', 'Mypage@showposts');

});

Route::group(['namespace'=>'Site','prefix'=>'site','middleware' => 'guest:web'],function (){
    Route::get('login','AuthController@loginPage')->name('login.page');
    Route::post('postLogin','AuthController@Login')->name('site.login');
    Route::post('register','AuthController@Register')->name('site.register');

});
