<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    //allcountries
    public function allcountries(){
        return view('backend.pages.country.all-countries');
    }
}
