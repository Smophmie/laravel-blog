<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;


class IndexController extends Controller
{
    public function welcome(Request $request): View
    {
        $categories= Category::all();
        
        if (isset($request->category_id) && $request->category_id !== null) 
        {
        $posts = Post::whereHas('categories', function ($query) use ($request){
            
            $query->where('categories.id', $request->category_id);
        })
        ->get();
        }else{
            $posts = Post::all();
        }


        return view('welcome', [
            'posts'=>$posts,
            'categories'=>$categories,
        ]);
    }

    public function admin(): View
    {   
        return view('postslist');
    }
}
