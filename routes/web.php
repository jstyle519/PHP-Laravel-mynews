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

Route::group(['prefix' => 'admin', "middleware" => 'auth'], function() {
    Route::get('news/create', 'Admin\NewsController@add')->middleware('auth');
    Route::post('news/create', 'Admin\NewsController@create');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
/* 3.http://XXXXXX.jp/XXX というアクセスが来たときに、
 AAAControllerのbbbというAction に渡すRoutingの設定」を書いてみてください
Route::get('xxx', 'Admin\AAAController@bbb');
*/
/*
4.【応用】 前章でAdmin/ProfileControllerを作成し、
 add Action, edit Actionを追加しました。
 web.phpを編集して、admin/profile/create にアクセスしたら ProfileController の
 add Action に、admin/profile/edit にアクセスしたら ProfileController の 
 edit Action に割り当てるように設定してください。
 */
 
 /*
 2.【応用】11章で /admin/profile/create にアクセスしたら ProfileController の
 add Action に割り当てるように設定しました。 ログインしていない状態で
 /admin/profile/create にアクセスした場合にログイン画面にリダイレクトされるように
 設定しましょう。
 
3.【応用】同様に 11章で /admin/profile/edit にアクセスしたら ProfileController 
の edit Action に割り当てるように設定しました。 ログインしていない状態で
/admin/profile/edit にアクセスした場合にログイン画面にリダイレクトされるように
設定しましょう。
*/

 Route::get('admin/profile/create', 'Admin\ProfileController@add')->middleware('auth');
 Route::get('admin/profile/edit', 'Admin\ProfileController@edit')->middleware('auth');
 Route::post('admin/profile/create', 'Admin\ProfileController@create');
 Route::post('admin/profile/edit', 'Admin\ProfileController@update');
 
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

// 3.応用】 routes/web.php を編集して、 admin/profile/create に postメソッドで
// アクセスしたら ProfileController の create Action に割り当てるように設定
// してください。

// 6.【応用】 routes/web.php を編集して、 admin/profile/edit に postメソッドでアクセスしたら
// ProfileController の update Action に割り当てるように設定してください。