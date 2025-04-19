<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller
{
    public function allSubCategories(){
        $subCategories = SubCategory::with('category')->latest()->get();
        return view('backend.pages.category-manage.sub-category.all-sub-categories', compact('subCategories'));
    }
    public function addSubCategory(){
        $categories = Category::all();
        return view('backend.pages.category-manage.sub-category.add-sub-category',compact('categories'));
    }
    public function storeSubCategory(Request $request){
    //    dd( $request->all());
        $request->validate([
            'name'=> 'required|string|unique:sub_categories,name|max:255',
            'category_name' => 'required' ,
            // 'image'=>'required|image|max:5120',
            'description'=>'required|string|max:255',
            'status'=> 'nullable',
        ]);
        if($request->hasFile('image')){
            $image = $request->image;
            // $imageTitle = saveImage($image, '/uploads/blogs/');
        };
        $subCategory = SubCategory::create([
            'name'=>$request->name,
            'description' =>$request->description,
            'slug'=>Str::slug($request->name),
            'status'=>$request->status,
            'category_id'=> $request->category_name,
        ]);
        if($subCategory){
            $subCategory->update([
                'name'=>$request->name,
                'description' =>$request->description,
                'slug'=>Str::slug($request->name),
                'status'=>$request->status,
                'category_id'=> $request->category_name,
            ]);
        }
        return redirect()->route('admin.all.sub.categories')->with('success',[($subCategory->wasRecentlyCreated ?'Create': 'Update').' sub category successfully!'] );
    }

    //deletecategory
    public function deleteSubCategory(Request $request, $id){
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->delete();
        return response()->json([
            'success'=>true,
        ]);
    }

    public function editSubCategory($id){
        $subCategory = SubCategory::where('id', $id)->with('category')->first();
        $categories = Category::all();
        // dd($state);
        return view('backend.pages.category-manage.sub-category.update-sub-category', compact('subCategory','categories'));
    }

    public function updateSubCategory(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_name' => 'required' ,
            // 'image'=>'required|image|max:5120',
            'description'=>'required|string|max:255',
            'status' => 'required|boolean',
        ]);
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->update([
            'name' => $request->name,
            'description' =>$request->description,
            'slug'=>Str::slug($request->name),
            'status'=>$request->status,
            'category_id'=> $request->category_name,
        ]);
        return response()->json(['message' => 'Sub category updated successfully']);
    }
}
