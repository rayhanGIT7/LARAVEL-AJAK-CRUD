<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    // Authentication
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $data = SubCategory::all();
        $category = Category::all();

        return view('admin.subcategory.index', compact('data', 'category'));
    }


    //subCategory store
    public function store(Request $request)
    {


        $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required|unique:sub_categories|max:55',


        ]);
        $subcategory = new SubCategory;
        $subcategory->category_id = $request->category_id;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->subcategory_slug = Str::of($request->subcategory_name)->slug('-');


        $subcategory->save();


        $notification = ['message' => 'SubCategory successfully inserted', 'alert-type' => 'success'];

        return redirect()->back()->with($notification);
    }
    //subcategory Edit

    public function edit(string $id)
  {


    $data=SubCategory::find($id);

    $category=Category::all();


    return view('admin.subcategory.index',compact('data','category'));
  }


    //subcategory update
    public function update(request $request, $id)
    {
        //query builder
        $subcategory = Category::Find($id);
        $subcategory->update([
            $subcategory->subcategory_name = $request->subcategory_name,
            $subcategory->subcategory_slug = Str::of($request->subcategory_name)->slug('-'),
        ]);

        return redirect()->route('subcategory.index')->with('success', 'Successfully Updated');
    }

    //category delete
    public function destroy($id)
    {
        //query builder
        // DB::table('categories')->where('id', $id)->delete();

        //Eloquent orm
        $category = SubCategory::Find($id);
        $category->delete();

        $notification = ['message' => 'SubCategory successfully Deleted', 'alert-type' => 'warning'];

        return redirect()->back()->with($notification);
        //return redirect()->route('category.index')->with('success', 'Successfully deleted');
    }
}
