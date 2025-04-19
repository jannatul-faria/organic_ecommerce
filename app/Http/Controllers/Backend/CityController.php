<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
     //allCities
     public function allCities(){
        $cities = City::with(['country','state'])->latest()->get();
        return view('backend.pages.country-manage.city.all-cities', compact('cities'));
    }
    public function addCity(){
        $countries = Country::all();
        $states = State::all();
        return view('backend.pages.country-manage.city.add-city',compact('countries','states'));
    }
    public function storeCity(Request $request){
    //    dd( $request->all());
        $request->validate([
            'name'=> 'required|string|unique:cities,name|max:255',
            'country_name'=> 'required',
            'state_name'=>'required',
            'status'=> 'nullable|boolean',
        ]);

        $city = city::create([
            'name'=>$request->name,
            'country_id'=>$request->country_name,
            'state_id'=> $request->state_name,
            'status'=>$request->status,
        ]);
        if($city){
            $city->update([
                'name'=>$request->name,
                'country_id'=>$request->country_name,
                'state_id'=> $request->state_name,
                'status'=>$request->status,
            ]);
        }
        return redirect()->route('admin.all.cities')->with('success',[($city->wasRecentlyCreated ?'Create': 'Update').' city successfully!'] );
    }

    // getStates
    public function getStates(Request $request){
        $states= State::where('country_id', $request->country_id)->pluck('name','id');
        return response()->json($states);
    }

     //deleteState
    public function deleteCity(Request $request, $id){
        $city = City::findOrFail($id);
        $city->delete();
        return response()->json([
            'success'=>true,
        ]);
    }

    public function editCity($id){
        $city = City::where('id', $id)->with(['country','state'])->first();
        $countries = Country::all();
        $states = State::all();
        // dd($city);
        return view('backend.pages.country-manage.city.update-city', compact('city','countries','states'));
    }

    public function updateCity(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'country_name'=> 'required',
            'state_name'=>'required',
            'status' => 'required|boolean',
        ]);
        $city = City::findOrFail($id);
        $city->update([
            'name' => $request->name,
            'country_id'=>$request->country_name,
            'state_id'=> $request->state_name,
            'status' => $request->status,
        ]);
        return response()->json(['message' => 'State updated successfully']);
    }

}