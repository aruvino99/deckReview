<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //外部キー制約の無効
        Schema::disableForeignKeyConstraints();
        
        //投稿テーブル
        Schema::create('threads', function (Blueprint $table) {
            //投稿ID
            $table->bigIncrements('id');
            //タイトル
            $table->string('title');
            //説明
            $table->string('detail');
            //デッキの説明
            $table->string('image')->nullable()->default(null)->change();
            $table->timestamps();
            //user外部キー制約
            $table->unsignedBigInteger('user_id')->index;
            $table->foreign('user_id')->references('id')->on('users');
        });
        
        //一時的に無効にした外部キー制約を有効にする
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('threads');
    }
}
