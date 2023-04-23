<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Album;
use Illuminate\Support\Facades\Validator;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $album=Album::orderBy('id', 'desc')->get();
        return view ('back.albums.index')->with('albums',$album);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.albums.create');
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
            'txtname' => 'required'
        ],[
            'txtname.required'=>'وارد کردن عنوان الزامی است'
        ])->validate();

        $file=$request->file('formFile');
        $image="";

        if(!empty($file)){
            $image=time().".".$file->getClientOriginalExtension();
            $file->move('front/image/gallery',$image);
        }

        $album_status=0;
        if($request->has('chkstatus'))
            $album_status=1;
        
        album::create([
            'title'=>$request->txtname,
            'image'=>$image,
            'description'=>$request->txtdescription,
            'status'=>$album_status
        ]);

        return Redirect('home/album')->with('flash_message','پیام موسس اضافه شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album=album::findorfail($id);
        return view ('back.albums.show')->with('album',$album);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album=Album::findorfail($id);
        return view ('back.albums.edit')->with('album',$album);
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
        $album=Album::findorfail($id);
        $file=$request->file('formFile');
        $image="";

        if(!empty($file)){
            if(file_exists('front/image/gallery/'.$album->image))
                unlink('front/image/gallery/'.$album->image);

            $image=time().".".$file->getClientOriginalExtension();
            $file->move('front/image/gallery',$image);
        }
        else
            $image=$album->image;

        
        $album_status=0;
        if($request->has('chkstatus'))
            $album_status=1;
        
        $album->update([
            'title'=>$request->txtname,
            'image'=>$image,
            'description'=>$request->txtdescription,
            'status'=>$album_status
        ]);

        return Redirect('home/album')->with('flash_message','پیام موسس بروزرسانی شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album=Album::findorfail($id);
       
        if(file_exists('front/image/gallery/'.$album->image))
            unlink('front/image/gallery/'.$album->image);
        
        $album->destroy($id);
        return Redirect('home/album')->with('flash_message','پیام موسس حذف شد');
    }
}
