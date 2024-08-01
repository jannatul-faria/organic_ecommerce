<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function home(){
        return view('frontend.components.website.home');
    }
    public function shop(){
        return view('frontend.components.website.shop');
    }
    public function shopDetail(){
        return view('frontend.components.website.shopDetail');
    }
    public function shoppingCart(){
        return view('frontend.components.website.shoppingCart');
    }
    public function blogs(){
        return view('frontend.components.website.blog');
    }
    public function singleBlog(){
        return view('frontend.components.website.blogDetail');
    }
    public function checkOut(){
        return view('frontend.components.website.checkOut');
    }
    public function contactUs(){
        return view('frontend.components.website.contact');
    }
    // public function home(){
    //     return view('frontend.components.website.home');
    // }
    // public function home(){
    //     return view('frontend.components.website.home');
    // }
}