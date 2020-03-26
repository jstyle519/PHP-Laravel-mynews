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

Route::group(['prefix' => 'admin'], function() {
 Route::get('news/create', 'Admin\NewsController@add')->middleware('auth');
 Route::post('news/create', 'Admin\NewsController@create')->middleware('auth');
 Route::get('news', 'Admin\NewsController@index')->middleware('auth');
 Route::get('news/edit', 'Admin\NewsController@edit')->middleware('auth'); // 追記
 Route::post('news/edit', 'Admin\NewsController@update')->middleware('auth'); // 追記
 Route::get('news/delete', 'Admin\NewsController@delete')->middleware('auth');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
/* 3.http://XXXXXX.jp/XXX というアクセスが来たときに、
 AAAControllerのbbbというAction に渡すRoutingの設定」を書いてみてください
Route::get('xxx', 'Admin\AAAController@bbb');
*/
Route::group(['prefix' => 'admin'], function() {
 Route::get('profile/create', 'Admin\ProfileController@add')->middleware('auth');
 Route::post('profile/create', 'Admin\ProfileController@create')->middleware('auth');
 Route::get('profile/edit', 'Admin\ProfileController@edit')->middleware('auth');
 Route::post('profile/edit', 'Admin\ProfileController@update')->middleware('auth');
}); 
// 1, GETメソッドとPOSTメソッドについて調べ、どのような違いがあるか説明してください。
// ・GETメソッド=>WebブラウザからWebサーバに渡す値をURL（ホームページの住所）の後ろにくっつけて送ること　　
// ・POSTメソッド=>WebブラウザからWebサーバに渡す値をURL（ホームページの住所）の見えない所にくっつけて送ること


// 2.【応用】 GET/POSTメソッド以外にどのようなメソッドがあるか、
// またどのように使われるかを説明してください
// ・PUT=>新しいリソースを作成するか、指定したリソースの表現をリクエストしたペイロードに置き換える
// ・DELETE=>指定したリソースを削除する
// ・HEAD=>getメソッドと同じであるが、ページの中は取得しない。
// ・OPTIONS=>対象リソースの通信オプションを示すために使用します。
// ・TRACE=>対象リソースへのパスに沿ってメッセージのループバックテストを実行します。
// ・CONNECT=>対象リソースで識別されるサーバーとの間にトンネルを確立します。
// ・PATCH=>リソースを部分的に変更するために使用します。
