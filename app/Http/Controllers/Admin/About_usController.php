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
    protected $folder_name = "about_us";
    protected $last_id = "1";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $lang_id = Lang::getLangId();
        $about_us = DB::select("SELECT * FROM about_uses WHERE lang_id = $lang_id");

        // return $about_us;
        return view('admin.about_us.index',[
            'locale' => App::getLocale(),
            'about_us' => $about_us,
        ]);
        // return view('admin.about_us.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // $last_id_array = DB::select("SELECT  AUTO_INCREMENT
        //                         FROM    information_schema.TABLES
        //                         WHERE   (TABLE_NAME = 'about_uses')");
        // $last_id = $last_id_array[0]->AUTO_INCREMENT;
        $last_id = $this->last_id;
        $folder_name = $this->folder_name;
        $images = Storage::files('public/'.$folder_name.'/'.$last_id);
        $imageurls = [];
        for ($i=0; $i < count($images) ; $i++) {
            $imageurls[$i]['url'] = Storage::url($images[$i]);
            $imageurls[$i]['size'] = $size = Storage::size($images[$i]);
        }

        $lang_id = Lang::getLangId();
        // return $lang_id;

        return view("admin.about_us.create",[
            'locale' => App::getLocale(),
            'last_id' =>$last_id,
            'imageurls' => $imageurls,
            'folder_name' => $folder_name,
            'lang_id' => $lang_id,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request, $locale)
    {
        $this->validate($request,[
            'title' => 'required',
            'html_code' => 'required',
            'lang_id' => 'required|integer',
        ]);
        $about_us = new About_us;

        $paraParams = [
            'title' => $request->input('title'),
            'lang_id' => $request->input('lang_id'),
            'html_code' => $request->input('html_code'),
            // 'img' => $request->input('img'),
        ];

        DB::table('about_uses')->insert( $paraParams );

        return redirect()->route('admin.about_us.index', App::getLocale());
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
        $about_us = About_us::find($id);
        $lang_id = Lang::getLangId();
        $images = Storage::files('public/'.$this->folder_name.'/'.$this->last_id);
        $imageurls = [];
        for ($i=0; $i < count($images); $i++) {
            $imageurls[$i]['url'] = Storage::url($images[$i]);
            $imageurls[$i]['size'] = $size = Storage::size($images[$i]);
        } 
        
        return view('admin.about_us.edit',[
            'about_us' => $about_us,
            'locale'=>$locale,
            'last_id' => $this->last_id,
            'folder_name' => $this->folder_name,
            'imageurls' => $imageurls,
            'lang_id' => $lang_id,
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
            'lang_id' => 'required|integer',
            'html_code' => 'required',
        ]);
        
        $about_us = About_us::find($id);
            $about_us->title = $request->input('title');
            $about_us->lang_id = $request->input('lang_id');
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
