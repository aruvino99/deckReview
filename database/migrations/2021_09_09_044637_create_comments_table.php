<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //投稿に対するコメントテーブル
        Schema::create('comments', function (Blueprint $table) {
            //コメントID
            $table->bigIncrements('id');
            //コメント内容
            $table->text('message');
            //デッキの評価(０～５の星でつけるデフォルトは０)
            $table->integer('star')->default(0);
            $table->timestamps();
            //user外部キー制約
            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
