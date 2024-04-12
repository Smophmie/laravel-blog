<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Category;

class CategoryController extends Controller
{
    public function categorieslist(): View
    {
      $categories = Category::all();
      return view('all-categories', [
          'categories'=>$categories,
      ]);
    }

    public function modifcategoryform($id)
  {
    $category = Category::find($id);
    return view('modif-category', compact('post'), [
      'category'=>$category,
    ]);
  }

  public function createcategoryform()
  {
    return view('create-category');
  }

  public function store(Request $request)
    {
      $request->validate([
          'name' => 'required|max:255',
      ]);
      Category::create($request->all());
      return redirect()->route('postslist')
      ->with('success', 'Post created successfully.');
    }
}
