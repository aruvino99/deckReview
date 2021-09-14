<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Thread;
use App\User;

class DeckReviewDetailController extends Controller
{
    //投稿の詳細とコメントを表示
    public function show(Request $request,$id) {
        $thread = Thread::where('id',$id)->first();
        $comments = Comment::all();
        $users = User::all();

        return view('detail', ['thread' => $thread,'comment' => $comments,'user'=>$users]);
    }
}
