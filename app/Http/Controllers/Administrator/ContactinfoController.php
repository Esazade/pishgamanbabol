<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contactinfo;
use Illuminate\Support\Facades\Validator;

class ContactinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactinfo=Contactinfo::all();
        return view ('back.contactinfo.index')->with('contactinfo',$contactinfo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.contactinfo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contactinfo=Contactinfo::findorfail($id);
        return view ('back.contactinfo.show')->with('contactinfo',$contactinfo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contactinfo=Contactinfo::findorfail($id);
        return view ('back.contactinfo.edit')->with('contactinfo',$contactinfo);
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
        $contactinfo=Contactinfo::findorfail($id);
        
        $contactinfo->update([
            'phone'=>$request->txtphone,
            'mobile'=>$request->txtmobile,
            'email'=>$request->txtemail,
            'address'=>$request->txtaddress,
            'googlemap'=>$request->txtgoogle,
            'insta'=>$request->txtinsta,
            'whatsapp'=>$request->txtwhatsapp,
            'telegram'=>$request->txttelegram,
            'igap'=>$request->txtigap,
            'eita'=>$request->txteita
        ]);

        return Redirect('home/contactinfo')->with('flash_message',' اطلاعات تماس بروزرسانی شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contactinfo::destroy($id);
        return Redirect('home/dialogue')->with('flash_message','اطلاعات تماس حذف شد');
    }
}
