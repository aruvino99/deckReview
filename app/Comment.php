<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    //投稿テーブルのモデル
    protected $table = 'comment';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
