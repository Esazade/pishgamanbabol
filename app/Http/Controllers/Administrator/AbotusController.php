<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aboutus;
use Illuminate\Support\Facades\Validator;

class AbotusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutus=Aboutus::all();
        return view ('back.aboutus.index')->with('aboutus',$aboutus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.aboutus.create');
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
            'txtdescription'=> 'required'
        ],[
            'txtdescription.required'=>'وارد کردن متن سخن الزامی است'
        ])->validate();

        $file=$request->file('formFile');
        $image="";

        if(!empty($file)){
            $image=time().".".$file->getClientOriginalExtension();
            $file->move('front/image/aboutus',$image);
        }
        
        Aboutus::create([
            'image'=>$image,
            'description'=>$request->txtdescription
        ]);

        return Redirect('home/aboutus')->with('flash_message','درباره ما اضافه شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aboutus=Aboutus::findorfail($id);
        return view ('back.aboutus.show')->with('aboutus',$aboutus);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aboutus=Aboutus::findorfail($id);
        return view ('back.aboutus.edit')->with('aboutus',$aboutus);
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
        $aboutus=Aboutus::findorfail($id);
        $file=$request->file('formFile');
        $image="";

        if(!empty($file)){
            if(file_exists('front/image/aboutus/'.$aboutus->image))
                unlink('front/image/aboutus/'.$aboutus->image);

            $image=time().".".$file->getClientOriginalExtension();
            $file->move('front/image/aboutus',$image);
        }
        else
            $image=$aboutus->image;

                
        $aboutus->update([
            'image'=>$image,
            'description'=>$request->txtdescription
        ]);

        return Redirect('home/aboutus')->with('flash_message','درباره ما بروزرسانی شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aboutus=Aboutus::findorfail($id);
       
        if(file_exists('front/image/aboutus/'.$aboutus->image))
            unlink('front/image/aboutus/'.$aboutus->image);
        
        $aboutus->destroy($id);
        return Redirect('home/aboutus')->with('flash_message',' درباره ما حذف شد');
    }
}
