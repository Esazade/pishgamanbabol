<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders=Slider::all();
        return view ('back.sliders.index')->with('sliders',$sliders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'txtname' => 'required',
            'formFile'=> 'required'
        ],[
            'txtname.required'=>'وارد کردن عنوان الزامی است',
            'formFile.required'=>'وارد کردن عکس الزامی است'
        ])->validate();

        $file=$request->file('formFile');
        $image="";

        if(!empty($file)){
            $image=time().".".$file->getClientOriginalExtension();
            $file->move('front/image/slider',$image);
        }

        $slider_status=0;
        if($request->has('chkstatus'))
            $slider_status=1;

        slider::create([
            'image'=>$image,
            'name'=>$request->txtname,
            'status'=>$slider_status
        ]);

        return Redirect('home/slider')->with('flash_message','اسلایدر اضافه شد');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slider=Slider::findorfail($id);
        return view ('back.sliders.show')->with('slider',$slider);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider=Slider::findorfail($id);
        return view ('back.sliders.edit')->with('slider',$slider);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slider=Slider::findorfail($id);
        $file=$request->file('formFile');
        $image="";

        if(!empty($file)){
            if(file_exists('front/image/slider/'.$slider->image))
                unlink('front/image/slider/'.$slider->image);

            $image=time().".".$file->getClientOriginalExtension();
            $file->move('front/image/slider',$image);
        }
        else
            $image=$slider->image;

        $slider_status=0;
        if($request->has('chkstatus'))
            $slider_status=1;
        
        $slider->update([
            'image'=>$image,
            'name'=>$request->txtname,
            'status'=>$slider_status
        ]);

        return Redirect('home/slider')->with('flash_message','اسلایدر بروزرسانی شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider=Slider::findorfail($id);
       
        if(file_exists('front/image/slider/'.$slider->image))
            unlink('front/image/slider/'.$slider->image);
        
        $slider->destroy($id);
        return Redirect('home/slider')->with('flash_message','اسلایدر حذف شد');
    }
}
