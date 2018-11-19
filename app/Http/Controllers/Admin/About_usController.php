<?php
namespace App\Http\Controllers\Admin;
use App\About_us;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use DB;
use App;    
use App\Lang;
class About_usController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $folder_name = "about_us";
    protected $last_id = "1";

    public function index()
    {
        $lang_id = Lang::getLangId();
        $about_us = DB::select("SELECT * FROM about_uses WHERE lang_id = $lang_id");
        return view('admin.about_us.index',[
            'locale' => App::getLocale(),
            'about_us' => $about_us,
        ]);
        return view('admin.about_us.index');
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
     * @param  \App\About_us  $about_us
     * @return \Illuminate\Http\Response
     */
    public function show(About_us $about_us)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\About_us  $about_us
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $locale)
    {
        $lang_id = Lang::getLangId();
        $images = Storage::files('public/'.$this->folder_name.'/'.$this->last_id);
        $imageurls = [];
        for ($i=0; $i < count($images); $i++) {
            $imageurls[$i]['url'] = Storage::url($images[$i]);
            $imageurls[$i]['size'] = $size = Storage::size($images[$i]);
        }
    
        $about_us = About_us::find($id);
        // return $about_us;x
        App::setLocale($locale);
        
        return view('admin.about_us.edit',[
            'about_us' => $about_us,
            'locale'=>$locale,
            'last_id' =>$this->last_id,
            'folder_name' =>$this->folder_name,
            'imageurls' => $imageurls,
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\About_us  $about_us
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $locale, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'html_code' => 'required',
        ]);
        
        $about_us = About_us::find($id);
            $about_us->title = $request->input('title');
            $about_us->html_code = $request->input('html_code');
        $about_us->save();
        return redirect()->route('admin.about_us.index', $locale)->with('success','Post Created');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\About_us  $about_us
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
      //
    }
}