<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ChildCategory;
use App\Http\Controllers\Controller;

class ChildCategoryController extends Controller
{
         //allCities
         public function allChildCategories(){
            $childCategories = ChildCategory::with('category','subCategory')->latest()->get();
            return view('backend.pages.category-manage.child-category.all-child-categories', compact('childCategories'));
        }
        public function addChildCategory(){
            $categories = Category::all();
            $subCategories= SubCategory::all();
            return view('backend.pages.category-manage.child-category.add-child-category',compact('categories','subCategories'));
        }
        public function storeChildCategory(Request $request){
        //    dd( $request->all());
            $request->validate([
                'name'=> 'required|string|unique:child_categories,name|max:255',
                'category_name'=> 'required',
                'sub_category_name'=>'required',
                'description'=>'required|string|max:255',
                'status'=> 'nullable',
            ]);
    // dd($request->validate());
            $childCategory = ChildCategory::create([
                'name'=>$request->name,
                'description' =>$request->description,
                'slug'=>Str::slug($request->name),
                'status'=>$request->status,
                'category_id'=>$request->category_name,
                'sub_category_id'=> $request->sub_category_name,
               
            ]);
            
            if($childCategory){
                $childCategory->update([
                    'name'=>$request->name,
                    'description' =>$request->description,
                    'slug'=>Str::slug($request->name),
                    'status'=>$request->status,
                    'category_id'=>$request->category_name,
                    'sub_category_id'=> $request->sub_category_name,
                    
                ]);
            }
            return redirect()->route('admin.all.child.categories')->with('success',[($childCategory->wasRecentlyCreated ?'Create': 'Update').' child category successfully!'] );
        }
    
        // getStates
        public function getSubCategory(Request $request){
            $subCategory= SubCategory::where('category_id', $request->category_id)->pluck('name','id');
            return response()->json($subCategory);
        }
    
         //deleteState
         public function deleteChildCategory(Request $request, $id){
            $childCategory = ChildCategory::findOrFail($id);
            $childCategory->delete();
            return response()->json([
                'success'=>true,
            ]);
        }
}
