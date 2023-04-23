<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;
use Illuminate\Support\Facades\Validator;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($gallery_id)
    {
        $photos = Photo::where('album_id', $gallery_id)->orderBy('id', 'desc')->get();
        return view('back.photos.index',  ['photos' => $photos,'gallery_id' => $gallery_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($gallery_id)
    {
        return view('back.photos.create',['gallery_id' => $gallery_id]);
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
            'txtgallery' => 'required'
        ],[
            'txtname.required'=>'وارد کردن عنوان الزامی است',
            'txtgallery.required'=>'وارد کردن عنوان الزامی است'
        ])->validate();

        $file=$request->file('formFile');
        $image="";

        if(!empty($file)){
            $image=time().".".$file->getClientOriginalExtension();
            $file->move('front/image/gallery',$image);
        }

        $photo_status=0;
        if($request->has('chkstatus'))
            $photo_status=1;
        
        $gallery_id=$request->txtgallery;
        Photo::create([
            'album_id'=>$gallery_id,
            'title'=>$request->txtname,
            'image'=>$image,
            'description'=>$request->txtdescription,
            'status'=>$photo_status
        ]);
        
        return redirect()->route('album.photo.index', $gallery_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $photo=Photo::findorfail($id);
        return view ('back.photos.show')->with('photo',$photo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $photo=Photo::findorfail($id);
        return view ('back.photos.edit')->with('photo',$photo);
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
        $Photo=Photo::findorfail($id);
        $file=$request->file('formFile');
        $image="";

        if(!empty($file)){
            if(file_exists('front/image/gallery/'.$Photo->image))
                unlink('front/image/gallery/'.$Photo->image);

            $image=time().".".$file->getClientOriginalExtension();
            $file->move('front/image/gallery',$image);
        }
        else
            $image=$Photo->image;

        
        $photo_status=0;
        if($request->has('chkstatus'))
            $photo_status=1;
        
        $Photo->update([
            'title'=>$request->txtname,
            'image'=>$image,
            'description'=>$request->txtdescription,
            'status'=>$photo_status
        ]);

        return redirect()->route('album.photo.index', $Photo->album_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Photo=Photo::findorfail($id);
       
        if(file_exists('front/image/gallery/'.$Photo->image))
            unlink('front/image/gallery/'.$Photo->image);
        
        $Photo->destroy($id);
        return redirect()->route('album.photo.index', $Photo->album_id);
    }
}
