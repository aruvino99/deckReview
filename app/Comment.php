<?php

namespace App;

use App\Comment;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    //投稿テーブルのモデル
    protected $table = 'comments';
    protected $primaryKey = 'id';
    public $timestamps = false;
    
    public function thread() {
        return $this->belongsTo('App\thread');
    }
}
