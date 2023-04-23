<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Dialogue;
use App\Models\Founder;
use App\Models\Aboutus;
use App\Models\Contactinfo;
use App\Models\Album;
use App\Models\Information;
use App\Models\contactus;



class FrontController extends Controller
{
    public function index()
    {
        $slider=Slider::where('status',1)->orderby('id','desc')->limit(3)->get();

        $dialogue=Dialogue::where('status',1)->inRandomOrder()->first();

        $founder=Founder::where('status',1)->orderby('id','desc')->first();

        $aboutus=Aboutus::orderby('id','desc')->first();
        $contactinfo=Contactinfo::orderby('id','desc')->first();

        $album=Album::where('status',1)->orderby('id','desc')->limit(6)->get();

        $information=Information::where('status',1)->inRandomOrder()->first();


        return view('front.index',compact('slider','dialogue','founder','aboutus','contactinfo','album','information'));
    }

    public function contactus()
    {
        $aboutus=Aboutus::orderby('id','desc')->first();
        $contactinfo=Contactinfo::orderby('id','desc')->first();
        return view('front.contactus',compact('contactinfo','aboutus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'yourName' => 'required',
            'emailInput' => 'required|email',
            'textareaBox' => 'required'
        ]);

        contactus::create([
            'name'=>$request->yourName,
            'email'=>$request->emailInput,
            'message'=>$request->textareaBox
        ]);
  
        return redirect()->back()
                         ->with(['success' => 'Thank you for contact us. we will contact you shortly.']);
    }

    public function aboutus()
    {
        $aboutus=Aboutus::orderby('id','desc')->first();
        $contactinfo=Contactinfo::orderby('id','desc')->first();
        return view('front.aboutus',compact('contactinfo','aboutus'));
    }

    public function gallery()
    {
        $aboutus=Aboutus::orderby('id','desc')->first();
        $contactinfo=Contactinfo::orderby('id','desc')->first();
        $album=Album::where('status',1)->orderby('id','desc')->limit(6)->get();
        return view('front.gallery',compact('contactinfo','aboutus','album'));
    }
}
