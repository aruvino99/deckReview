<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

class DeckReviewPostController extends Controller
{
    public function index(){
        $stitle = '';
        $sdetail = '';
        $simage = '';
        return view('create', compact('stitle','sdetail','simage'));
    }
    public function post(Request $request)
    {
        $request->session()->regenerateToken();
        
        $stitle = $request->stitle;
        $sdetail = $request->sdetail;
        $simage = $request->simage;
        
        $content = new Toukou();
        $content->stitle = $stitle;
        $content->sdetail = $sdetail;
        $content->simage = $simage;
        
        $content->save();
        return view('create', compact('stitle','sdetail','simage'));
    }
}

