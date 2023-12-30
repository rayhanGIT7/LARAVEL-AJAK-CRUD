<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;

use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use App\Models\Category;

class CategoryController extends Controller
{
  // Authentication
  public function __construct()
  {
    $this->middleware('auth');
  }

  //  show all category
  public function index()
  {
    $categories = DB::table('categories')->get();
    return view('admin.category.index', compact('categories'));
  }

  //category store


  public function store(Request $request)
  {


    $request->validate([
      'category_name' => 'required|unique:categories|max:25',


    ]);
    $category = new Category;
    $category->category_name = $request->category_name;
    $category->category_slug = Str::of($request->category_name)->slug('-');


    $category->save();


    $notification = ['message' => 'Category successfully inserted', 'alert-type' => 'success'];

    return redirect()->back()->with($notification);
  }

  //category edit
  public function edit(string $id)
  {
    //query builder
    // $category=DB::table('categories')->where('id',$id)->first();


    //Eloquent orm
    $data = Category::Find($id);

    return view('admin.category.index',compact('data'));
  }

//category update
  public function update(request $request, $id)
  {
    //query builder
    $category = Category::Find($id);
    $category->update([
      $category->category_name = $request->category_name,
      $category->category_slug = Str::of($request->category_name)->slug('-'),
    ]);

    return redirect()->route('category.index')->with('success', 'Successfully inserted');
  }

  //category delete
  public function destroy($id)
  {
    //query builder
    // DB::table('categories')->where('id', $id)->delete();

    //Eloquent orm
    $category = Category::Find($id);
    $category->delete();

    $notification = ['message' => 'Category successfully Deleted', 'alert-type' => 'warning'];

    return redirect()->back()->with($notification);
    //return redirect()->route('category.index')->with('success', 'Successfully deleted');
  }
}
