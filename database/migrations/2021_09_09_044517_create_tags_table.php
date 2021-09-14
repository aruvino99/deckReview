<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
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
        
        //投稿に付けるタグテーブル
        Schema::create('tags', function (Blueprint $table) {
            //タグID
            $table->bigIncrements('id');
            //タグ名
            $table->string('name');
            $table->timestamps();
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
        Schema::dropIfExists('tags');
    }
}
