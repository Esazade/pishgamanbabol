<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Information;
use Illuminate\Support\Facades\Validator;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $information=Information::all();
        return view ('back.informations.index')->with('informations',$information);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.informations.create');
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
            'txtdescription'=> 'required'
        ],[
            'txtname.required'=>'وارد کردن عنوان الزامی است',
            'txtdescription.required'=>'وارد کردن متن الزامی است'
        ])->validate();

        $file=$request->file('formFile');
        $image="";

        if(!empty($file)){
            $image=time().".".$file->getClientOriginalExtension();
            $file->move('front/image/information',$image);
        }

        $information_status=0;
        if($request->has('chkstatus'))
            $information_status=1;
        
        Information::create([
            'title'=>$request->txtname,
            'image'=>$image,
            'description'=>$request->txtdescription,
            'status'=>$information_status
        ]);

        return Redirect('home/information')->with('flash_message','پیام موسس اضافه شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $information=Information::findorfail($id);
        return view ('back.informations.show')->with('information',$information);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $information=Information::findorfail($id);
        return view ('back.informations.edit')->with('information',$information);
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
        $information=Information::findorfail($id);
        $file=$request->file('formFile');
        $image="";

        if(!empty($file)){
            if(file_exists('front/image/information/'.$information->image))
                unlink('front/image/information/'.$information->image);

            $image=time().".".$file->getClientOriginalExtension();
            $file->move('front/image/information',$image);
        }
        else
            $image=$information->image;

        
        $information_status=0;
        if($request->has('chkstatus'))
            $information_status=1;
        
        $information->update([
            'title'=>$request->txtname,
            'image'=>$image,
            'description'=>$request->txtdescription,
            'status'=>$information_status
        ]);

        return Redirect('home/information')->with('flash_message','پیام موسس بروزرسانی شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $information=Information::findorfail($id);
       
        if(file_exists('front/image/information/'.$information->image))
            unlink('front/image/information/'.$information->image);
        
        $information->destroy($id);
        return Redirect('home/information')->with('flash_message','پیام موسس حذف شد');
    }
}
