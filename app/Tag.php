<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    //投稿テーブルのモデル
    protected $table = 'tags';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
