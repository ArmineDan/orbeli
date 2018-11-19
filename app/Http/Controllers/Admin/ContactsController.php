<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App;    
use App\Lang;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang_id = Lang::getLangId();
        $contact = DB::select("SELECT * FROM contacts WHERE lang_id=$lang_id");
        return view('admin.contact.index',[
            'locale' => App::getLocale(),
            'contact' => $contact,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $locale)
    {
        $contact = Contact::find($id);
        App::setLocale($locale);
        
        return view('admin.contact.edit',[
            'contact' => $contact,
            'locale'=> $contact,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $locale)
    {
        $this->validate($request,[
            'address' => 'required',
            'phone' => 'required',
            'mail' => 'required',
            'title' => 'required',
            'text' => 'required',
            'lang_id' => 'required'
        ]);
        
        $contact = Contact::find($id);
            $contact->address_icon_text = $request->input('address');
            $contact->phone_icon_text = $request->input('phone');
            $contact->mail_icon_text = $request->input('mail');
            $contact->big_text_title = $request->input('title');
            $contact->big_text = $request->input('text');
            $contact->lang_id = $request->input('lang_id');
        $contact->save();

        return redirect()->route('admin.contact.index', $locale)->with('success','Post Created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
