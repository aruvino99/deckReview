<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Thread;
use App\Tag;
use App\User;

class DeckReviewListController extends Controller
{
    

    //トップ画面はすべてのデータがページング表示される
    public function index(){
        
        $threads = Thread::paginate(100);
        $users = User::all();
        return view('thread',['threads' => $threads,'users' => $users]);
    }
    
    //検索を行った結果を取得
    public function post(Request $request) {
        //入力が行われた値の取得
        $keyword = $request->input("keyword");
        $query = Thread::query();
        //タグ検索
        $thread = Thread::whereHas('tags', function ($query) use ($keyword) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        })->get();
        //Routeは仮にdeckReviewList
        return view("thread", ["threads" => $thread, "keyword" => $keyword]);
    }
}
