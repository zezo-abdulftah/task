<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\models\Post;
use Illuminate\Http\Request;

class HomePage extends Controller
{

    public function index(){

       // $posts=Post::with(['user','likes','comments'])->orderBy('id','DESC')->get();
        return view('site.index');
    }
}
