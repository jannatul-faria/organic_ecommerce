<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        $totalCategory = Category::count();
        $totalCities = City::count();
        // dd($totalCategory);
        return view('backend.pages.dashboard', compact(['totalCategory', 'totalCities']));
    }
}
