<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    //allStates
    public function allStates(){
        $states = State::with('country')->latest()->get();
        return view('backend.pages.country-manage.state.all-states', compact('states'));
    }
    public function addState(){
        $countries = Country::all();
        return view('backend.pages.country-manage.state.add-state',compact('countries'));
    }
    public function storeState(Request $request){
    //    dd( $request->all());
        $request->validate([
            'name'=> 'required|string|unique:states,name|max:255',
            'country_name'=> 'required',
            'status'=> 'nullable|boolean',
        ]);

        $state = State::create([
            'name'=>$request->name,
            'country_id'=>$request->country_name,
            'status'=>$request->status,
        ]);
        if($state){
            $state->update([
                'name'=>$request->name,
                'country_id'=>$request->country_name,
                'status'=>$request->status,
            ]);
        }
        return redirect()->route('admin.all.states')->with('success',[($state->wasRecentlyCreated ?'Create': 'Update').' state successfully!'] );
    }

     //deleteState
     public function deleteState(Request $request, $id){
        $state = State::findOrFail($id);
        $state->delete();
        return response()->json([
            'success'=>true,
        ]);
    }
}
