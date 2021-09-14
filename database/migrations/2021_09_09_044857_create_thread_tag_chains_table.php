<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThreadTagChainsTable extends Migration
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
        
        //デッキとコメントの中間テーブル
        Schema::create('thread_tag_chains', function (Blueprint $table) {
            //thread外部キー制約
            $table->unsignedBigInteger('thread_id')->index();
            $table->foreign('thread_id')->references('id')->on('threads');
            //tag外部キー制約
            $table->unsignedBigInteger('tag_id')->index();
            $table->foreign('tag_id')->references('id')->on('tags');
            //複合主キー
            $table->primary(['thread_id','tag_id']);
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
        Schema::dropIfExists('thread_tag_chains');
    }
}
