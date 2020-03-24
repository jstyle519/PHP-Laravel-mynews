<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = array('id');

    // 以下を追記
    
// 【応用】 Modelを作成するコマンドで Profile というModelを作成し、 
// 名前(name)、性別(gender)、趣味(hobby)、自己紹介(introduction)に対して
// Validationをかけるようにしてみましょう。

    public static $rules = array(
        'name' => 'required',
        'gender' => 'required',
        'hobby' => 'required',
        'introduction' => 'required',
    );
}


// 1.データベースとテーブルの関係を説明してください。
// =>データベースにはさまざまな種類のデータが格納されています。
// そのデータはバラバラではなく、データの種類ごとに規則正しく保存されているのが
// 特徴です。データベースの種類ごとの単位を「テーブル」

// 2.テーブルを作成するときに事前にしなければならないことはなんですか？
// =>Laravel では Migration という仕組みを使ってテーブル作ります。
// Migrationファイルの雛形を作るには、Controller と同様に artisan コマンドを使います。

// 3.Validationはどのような役目をしていますか？
// データの不備をあらかじめ防ぐために検証する仕組み
