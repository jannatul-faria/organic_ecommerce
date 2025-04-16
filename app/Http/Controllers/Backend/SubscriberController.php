<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    //allSubscribers
    public function allSubscribers(){
        $subcribers =Subscriber::latest()->get();
        return view('backend.pages.newsletter.subscribe.all-subscribers', compact('subcribers'));
    }
    //storeSubscriber
    public function storeSubscriber(Request $request){
        // dd($request->all());
        $request->validate([
            'email'=> 'required|email|unique:subscribers,email',
        ]);
        Subscriber::create([
            'email' => $request->email,
            'is_subscribed' => true,
            'subscribed_at' => now(),
        ]);
        response()->json(['success' => true]);
    }
}
