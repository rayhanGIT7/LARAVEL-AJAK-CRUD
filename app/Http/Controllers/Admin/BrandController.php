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
use App\Models\brand;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;



class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index(Request $request)
    {

        $brand = DB::table('brands')->get();

        return view('admin.brand.index', compact('brand'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'brand_name' => 'required|unique:brands|max:55',
        ]);

        $data = array();
        $slug = Str::of($request->brand_name)->slug('-');
        $data['brand_name'] = $request->brand_name;
        $data['brand_slug'] = Str::of($request->brand_name)->slug('-');

        $image = $request->brand_logo;
        $imageName = $slug.'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(200, 100)->save('public/file/brand' . $imageName);


        $data['brand_logo'] =$imageName;

        DB::table('brands')->insert($data);

        $notification = ['message' => 'Brand successfully inserted', 'alert-type' => 'success'];

        return redirect()->back()->with($notification);
    }

      //brand edit
  public function edit(string $id)
  {


    $data=DB::table('brands')->where('id',$id)->first();

        return response()->json($data);
  }

  public function update(Request $request, $id)
  {
      $data = Brand::find($id);

      $request->validate([
          'brand_name' => 'required|unique:brands,brand_name,' . $id . '|max:55',
      ]);

      $slug = Str::of($request->brand_name)->slug('-');

      $data->update([
          'brand_name' => $request->brand_name,
          'brand_slug' => $slug,
      ]);

      if ($request->hasFile('brand_logo')) {
          $image = $request->brand_logo;
          $imageName = $slug. '.' .$image->getClientOriginalExtension();

          // Delete old image if it exists
          if (File::exists(public_path($data->brand_logo))) {
              File::delete(public_path($data->brand_logo));
          }

          Image::make($image)->resize(200, 100)->save(public_path('file/brand/' . $imageName));

          $data->update(['brand_logo' => $imageName]);
      }

      DB::table('brands')->where('id', $request->id)->update([
          'brand_name' => $request->brand_name,
          'brand_slug' => $slug,
          'brand_logo' => $imageName,
      ]);

      return redirect()->route('your.route.name')->with('success', 'Brand updated successfully');
  }





    //brand delete
  public function destroy($id)
  {

    $brand=brand::Find($id);

    $brand->delete();

    $notification = ['message' => 'Category successfully Deleted', 'alert-type' => 'warning'];

    return redirect()->back()->with($notification);
    //return redirect()->route('category.index')->with('success', 'Successfully deleted');
  }

}
