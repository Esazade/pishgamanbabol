<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Founder;
use Illuminate\Support\Facades\Validator;

class FounderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $founder=Founder::all();
        return view ('back.founders.index')->with('founders',$founder);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.founders.create');
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
            'txtdescription.required'=>'وارد کردن متن سخن الزامی است'
        ])->validate();

        $file=$request->file('formFile');
        $image="";

        if(!empty($file)){
            $image=time().".".$file->getClientOriginalExtension();
            $file->move('front/image/founder',$image);
        }

        $founder_status=0;
        if($request->has('chkstatus'))
            $founder_status=1;
        
        Founder::create([
            'title'=>$request->txtname,
            'image'=>$image,
            'description'=>$request->txtdescription,
            'status'=>$founder_status
        ]);

        return Redirect('home/founder')->with('flash_message','پیام موسس اضافه شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $founder=Founder::findorfail($id);
        return view ('back.founders.show')->with('founder',$founder);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $founder=Founder::findorfail($id);
        return view ('back.founders.edit')->with('founder',$founder);
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
        $founder=Founder::findorfail($id);
        $file=$request->file('formFile');
        $image="";

        if(!empty($file)){
            if(file_exists('front/image/founder/'.$founder->image))
                unlink('front/image/founder/'.$founder->image);

            $image=time().".".$file->getClientOriginalExtension();
            $file->move('front/image/founder',$image);
        }
        else
            $image=$founder->image;

        
        $founder_status=0;
        if($request->has('chkstatus'))
            $founder_status=1;
        
        $founder->update([
            'title'=>$request->txtname,
            'image'=>$image,
            'description'=>$request->txtdescription,
            'status'=>$founder_status
        ]);

        return Redirect('home/founder')->with('flash_message','پیام موسس بروزرسانی شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $founder=Founder::findorfail($id);
       
        if(file_exists('front/image/founder/'.$founder->image))
            unlink('front/image/founder/'.$founder->image);
        
        $founder->destroy($id);
        return Redirect('home/founder')->with('flash_message','پیام موسس حذف شد');
    }
}
