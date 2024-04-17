<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Post;
use App\Models\User;

class IndexController extends Controller
{
    public function welcome(): View
    {
        $posts= Post::all();
        return view('welcome', [
            'posts'=>$posts,
        ]);
    }

    public function admin(): View
    {   
        return view('postslist');
    }
}
