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
    //addCountry 
    public function addCountry(){
        return view('backend.pages.country-manage.country.add-country');
    }
    //storeCountry and updateCountry
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
        // if($country){
        //     $country->update([
        //         'name'=>$request->name,
        //         'status'=>$request->status,
        //     ]);
        // }
        // return redirect()->route('admin.all.countries')->with('success',[($country->wasRecentlyCreated ?'Create': 'Update').' country successfully!'] );
        return redirect()->route('admin.all.countries')->with('success','Create country successfully!' );
    }
    //deleteCountry
    public function deleteCountry(Request $request, $id){
        $country = Country::findOrFail($id);
        $country->delete();
        return response()->json([
            'success'=>true,
        ]);
    }
    // editCountryBlade
    public function editCountry($id){
        $country = Country::where('id', $id)->first();
        // dd($country);
        return view('backend.pages.country-manage.country.update-country', compact('country'));
    }

    public function updateCountry(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);
        $country = Country::findOrFail($id);
        $country->update([
            'name' => $request->name,
            'status' => $request->status,
        ]);
        return response()->json(['message' => 'Country updated successfully']);
    }
    

}
