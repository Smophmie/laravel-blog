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
    return view('modif-category', [
      'category'=>$category,
    ]);
  }

  public function update(Request $request, $id)
    {
      $request->validate([
          'name' => 'required|max:255',
      ]);
      $category = Category::find($id);
      $category->update($request->all());
      return redirect()->route('categorieslist')
        ->with('success', 'Post updated successfully.');
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
      return redirect()->route('categorieslist')
      ->with('success', 'Post created successfully.');
    }

    public function destroy($id)
    {
      $category = Category::find($id);
      $category->delete();
      return redirect()->route('categorieslist')
        ->with('success', 'Post deleted successfully');
    }
}
