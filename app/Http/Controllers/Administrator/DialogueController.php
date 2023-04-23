<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dialogue;
use Illuminate\Support\Facades\Validator;

class DialogueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dialogue=Dialogue::all();
        return view ('back.dialogues.index')->with('dialogues',$dialogue);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.dialogues.create');
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

        $dialogue_status=0;
        if($request->has('chkstatus'))
            $dialogue_status=1;
        
        Dialogue::create([
            'title'=>$request->txtname,
            'description'=>$request->txtdescription,
            'status'=>$dialogue_status
        ]);

        return Redirect('home/dialogue')->with('flash_message','سخن روز اضافه شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dialogue=Dialogue::findorfail($id);
        return view ('back.dialogues.show')->with('dialogue',$dialogue);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dialogue=Dialogue::findorfail($id);
        return view ('back.dialogues.edit')->with('dialogue',$dialogue);
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
        $dialogue=Dialogue::findorfail($id);
        
        $dialogue_status=0;
        if($request->has('chkstatus'))
            $dialogue_status=1;
        
        $dialogue->update([
            'title'=>$request->txtname,
            'description'=>$request->txtdescription,
            'status'=>$dialogue_status
        ]);

        return Redirect('home/dialogue')->with('flash_message','سخن روز بروزرسانی شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Dialogue::destroy($id);
        return Redirect('home/dialogue')->with('flash_message','سخن روز حذف شد');
    }
}
