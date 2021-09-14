<?php

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



//仮のルーティング

Route::get('/',function(){
    return view('index');
})->name('login');

//投稿一覧
Route::group(['prefix'=> 'thread','middleware' => 'web'], function(){
    Route::get('/','deckReviewListController@index')->name('thread');
    Route::post('/','deckReviewListController@post');
});

//投稿詳細
Route::resource('thread', 'DeckReviewDetailController', ['only' => ['thread', 'show']]);


//投稿作成(ログインしていない場合ログイン画面へ)
Route::group(['prefix'=> 'create','middleware' => 'web'/*'auth'*/], function(){
    Route::get('/','deckReviewPostController@index');
    Route::post('/','deckReviewPostController@post');
});

