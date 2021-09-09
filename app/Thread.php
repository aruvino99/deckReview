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
    
    public function threads() {
        return $this->belongsToMany(app/Tag);
    }
}
