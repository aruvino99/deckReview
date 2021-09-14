<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    //
    //投稿テーブルのモデル
    protected $table = 'threads';
    protected $primaryKey = 'id';
    public $timestamps = false;
    
    
    //投稿とタグは多対多の関係を持つ
    public function tags() {
        return $this->belongsToMany('App\Tag','thread_tag_chains');
    }
    
    //投稿は複数のコメントを持つ
    public function comments() {
        return $this->hasMany('App\Comment');
    }
}
