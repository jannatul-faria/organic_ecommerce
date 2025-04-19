<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function allCategories(){
        $categories = Category::latest()->get();
        return view('backend.pages.category-manage.category.all-categories', compact('categories'));
    }
    public function addCategory(){
        return view('backend.pages.category-manage.category.add-category');
    }
    public function storeCategory(Request $request){
    //    dd( $request->all());
        $request->validate([
            'name'=> 'required|string|unique:categories,name|max:255',
            // 'image'=>'required|image|max:5120',
            'description'=>'required|string|max:255',
            'status'=> 'nullable',
        ]);
        if($request->hasFile('image')){
            $image = $request->image;
            // $imageTitle = saveImage($image, '/uploads/blogs/');
        };
        $category = Category::create([
            'name'=>$request->name,
            'description' =>$request->description,
            'slug'=>Str::slug($request->name),
            'status'=>$request->status,
        ]);
        if($category){
            $category->update([
                'name'=>$request->name,
                'status'=>$request->status,
            ]);
        }
        return redirect()->route('admin.all.categories')->with('success',[($category->wasRecentlyCreated ?'Create': 'Update').' category successfully!'] );
    }

    //deletecategory
    public function deleteCategory(Request $request, $id){
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json([
            'success'=>true,
        ]);
    }

    public function editCategory($id){
        $category = Category::where('id', $id)->first();
        // dd($category);
        return view('backend.pages.category-manage.category.update-category', compact('category'));
    }

    public function updateCategory(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'status' => $request->status,
        ]);
        return response()->json(['message' => 'Category updated successfully']);
    }
    
}
