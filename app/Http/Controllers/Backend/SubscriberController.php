<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    //allSubscribers
    public function allSubscribers(){
        $subcribers =Subscriber::all();
        return view('backend.pages.newsletter.subscribe.all-subscribers', compact('subcribers'));
    }
}
