<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Post;

class IndexController extends Controller
{
    public function welcome(): View
    {
        $posts= Post::all();
        
        return view('welcome', [
            'posts'=>$posts,
        ]);
    }
}
