<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Flasher\Toastr\Laravel\Facade\Toastr;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    //allcountries
    public function allcountries(){
        $countries = Country::latest()->get();
        return view('backend.pages.country-manage.country.all-countries', compact('countries'));
    }
    public function addCountry(){
        return view('backend.pages.country-manage.country.add-country');
    }
    public function storeCountry(Request $request){
    //    dd( $request->all());
        $request->validate([
            'name'=> 'required|string|unique:countries,name|max:255',
            'status'=> 'nullable|boolean',
        ]);

        $country = Country::create([
            'name'=>$request->name,
            'status'=>$request->status,
        ]);
        if($country){
            $country->update([
                'name'=>$request->name,
                'status'=>$request->status,
            ]);
        }
        return redirect()->route('admin.all.countries')->with('success',[($country->wasRecentlyCreated ?'Create': 'Update').' country successfully!'] );
    }

    //deleteCountry
    public function deleteCountry(Request $request, $id){
        $country = Country::findOrFail($id);
        $country->delete();
        return response()->json([
            'success'=>true,
        ]);
    }
    
}
