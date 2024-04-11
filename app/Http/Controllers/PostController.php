<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
  
  /**
   * Display a listing of the resource.
   */
  public function postslistbyauthor(): View
  {
    // Get user's id
    $userid = Auth::id();
    
    // Get posts where author_id matches with user's id
    $posts = Post::where('author_id', $userid)->get();
    return view('my-posts', [
        'posts'=>$posts,
    ]);
  }

  // Display a form to update it.
  // $id corresponds to the post's id that we want to update

  public function modifpostform($id)
  {
    $post = Post::find($id);
    $authorid = Auth::id();
    $authorname = Auth::user()->name;
    return view('modif-post', compact('post'), [
      'post'=>$post,
      'author'=>$authorname,
      'author_id'=>$authorid,
    ]);
  }


  //   Show the form to create a post.
  public function createpostform()
  {
    $id = Auth::id();
    $name = Auth::user()->name;
    return view('create-post', [
      'author'=>$name,
      'author_id'=>$id,
    ]);
  }


  /**
   * Store a newly created resource in storage.
   */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'content' => 'required',
            'image' => 'required',
            'author' => 'required',
            'author_id' => 'required',
        ]);
        Post::create($request->all());
        return redirect()->route('postslist')
        ->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
      $post = Post::find($id);
      return view('posts.show', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
      $request->validate([
          'title' => 'required|max:255',
          'description' => 'required',
          'content' => 'required',
          'image' => 'required',
      ]);
      $post = Post::find($id);
      $post->update($request->all());
      return redirect()->route('postslist')
        ->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
      $post = Post::find($id);
      $post->delete();
      return redirect()->route('dashboard')
        ->with('success', 'Post deleted successfully');
    }
}
