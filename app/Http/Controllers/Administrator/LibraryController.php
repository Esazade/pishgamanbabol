<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Library;
use Illuminate\Support\Facades\Validator;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libraries=Library::all();
        return view ('back.libraries.index')->with('libraries',$libraries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.libraries.create');
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
            'bookFile' => 'required|mimes:pdf,zip,rar,docx,doc,txt|max:2048'
        ],[
            'txtname.required'=>'وارد کردن عنوان الزامی است',
            'bookFile.required'=>'وارد کردن  فایل کتاب الزامی است'
        ])->validate();

        $file=$request->file('formFile');
        $bookfile=$request->file('bookFile');
        $image="";
        $book="";

        if(!empty($bookfile)){
            $book=time().".".$bookfile->getClientOriginalExtension();
            $bookfile->move('front/image/library/file',$book);
        }

        if(!empty($file)){
            $image=time().".".$file->getClientOriginalExtension();
            $file->move('front/image/library/image',$image);
        }

        $library_status=0;
        if($request->has('chkstatus'))
            $library_status=1;
        
        Library::create([
            'title'=>$request->txtname,
            'url'=>$book,
            'image'=>$image,
            'description'=>$request->txtdescription,
            'status'=>$library_status
        ]);

        return Redirect('home/library')->with('flash_message',' کتاب جدید اضافه شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $library=Library::findorfail($id);
        return view ('back.libraries.show')->with('library',$library);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $library=Library::findorfail($id);
        return view ('back.libraries.edit')->with('library',$library);
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
        $library=Library::findorfail($id);
        $file=$request->file('formFile');
        $bookfile=$request->file('bookFile');
        $image="";
        $book="";

        if(!empty($bookfile)){
            if(file_exists('front/image/library/file/'.$library->url))
                unlink('front/image/library/file/'.$library->url);

            $book=time().".".$bookfile->getClientOriginalExtension();
            $bookfile->move('front/image/library/file',$book);
        }
        else
            $book=$library->url;

        if(!empty($file)){
            if(file_exists('front/image/library/image/'.$library->image))
                unlink('front/image/library/image/'.$library->image);

            $image=time().".".$file->getClientOriginalExtension();
            $file->move('front/image/library/image',$image);
        }
        else
            $image=$library->image;

        
        $library_status=0;
        if($request->has('chkstatus'))
            $library_status=1;
        
        $library->update([
            'title'=>$request->txtname,
            'url'=>$book,
            'image'=>$image,
            'description'=>$request->txtdescription,
            'status'=>$library_status
        ]);

        return Redirect('home/library')->with('flash_message',' کتاب بروزرسانی شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $library=Library::findorfail($id);
       
        if(file_exists('front/image/library/file/'.$library->url))
            unlink('front/image/library/file/'.$library->url);

        if(file_exists('front/image/library/image/'.$library->image))
            unlink('front/image/library/image/'.$library->image);
        
        $library->destroy($id);
        return Redirect('home/library')->with('flash_message',' کتاب موردنظر حذف شد');
    }
}
