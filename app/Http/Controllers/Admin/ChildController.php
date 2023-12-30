<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

use Config\app\DataTables;

use function Laravel\Prompts\table;

class ChildController extends Controller
{
     // Authentication
     public function __construct()
     {
         $this->middleware('auth');
     }



     public function index(Request $request)
     {
         if ($request->ajax()) {
             $data = DB::table('child_categories')
                 ->leftJoin('categories', 'child_categories.category_id', 'categories.id')
                 ->leftJoin('sub_categories', 'child_categories.subcategory_id', 'sub_categories.id')
                 ->select('categories.category_name', 'sub_categories.subcategory_name', 'child_categories.*')
                 ->get();

             return DataTables::of($data)
                 ->addIndexColumn()
                 ->addColumn('action', function ($row) {
                     $action_btn = '<a href="#" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>';

                     return $action_btn;
                 })
                 ->rawColumns(['action']) // Define 'action' as raw HTML
                 ->make(true);
         }

         $category = DB::table('categories')->get();

         return view('admin.childcategory.index', compact('category'));
     }



     public function store(Request $request)
          {


        // $request->validate([
        //     'subcategory_id' => 'required',
        //     'childcategory_name' => 'required|unique:sub_categories|max:55',


        // ]);
        $category=DB::table('sub_categories')->where('category_id',$request->subcategory_id)->first();

        $data=array();
        $data['category_id']=$category->category_id;
        $data['subcategory_id']=$request->subcategory_id;
        $data['childcategory_name']=$request->childcategory_name;
        $data['childcategory_slug']=Str::of($request->childcategory_name)->slug('-');



        DB::table('child_categories')->insert($data);

        $notification = ['message' => 'SubCategory successfully inserted', 'alert-type' => 'success'];

        return redirect()->back()->with($notification);
    }

}

