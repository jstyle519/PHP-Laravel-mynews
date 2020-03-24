<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     
// 4.応用】 create_profiles_table というMigrationの雛形ファイルを作成し、
// profilesというテーブル名で名前(name)、性別(gender)、趣味(hobby)、自己紹介(introduction)を
// 保存できるように修正して、 migrateしてテーブルを作成しましょう。


    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name'); // profileのnameを保存するカラム
            $table->string('gender');  // 性別を保存するカラム
            $table->string('hobby');  // 趣味を保存するカラム
            $table->string('introduction');  // 自己紹介を保存するカラム
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
