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
        $about_uses = DB::select("SELECT * FROM about_uses WHERE lang_id = $lang_id");

        // return $about_us;
        return view('admin.about_us.index',[
            'locale' => App::getLocale(),
            'about_uses' => $about_uses,
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
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request, $locale)
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
        $folder_name = "about_uses";

        $images = Storage::files('public/'.$folder_name.'/'.$id);

        $imageurls = [];
        for ($i=0; $i < count($images); $i++) {
            $imageurls[$i]['url'] = Storage::url($images[$i]);
            $imageurls[$i]['size'] = $size = Storage::size($images[$i]);
        }
    
        $about_uses = About_us::find($id);
        App::setLocale($locale);
        
        return view('admin.about_us.edit',[
            'about_uses' => $about_uses,
            'locale'=> $locale,
            'last_id' => $id,
            'lang_id' => $lang_id,
            'folder_name' => $folder_name,
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
            'first_section_img' => 'required',
            'parallax_title' => 'required',
            'parallax_text' => 'required',

            'parallax_first_box_img' => 'required',
            'parallax_second_box_img' => 'required',
            'parallax_third_box_img' => 'required',

            'parallax_first_box_title' => 'required',
            'parallax_second_box_title' => 'required',
            'parallax_third_box_title' => 'required',

            'parallax_first_box_text' => 'required',
            'parallax_second_box_text' => 'required',
            'parallax_third_box_text' => 'required',

            'video_img' => 'required',
            'video_url' => 'required',
            'video_text' => 'required',

            'end_title' => 'required',
            'end_text' => 'required'
        ]);
        
        $about_us = About_us::find($id);
            $about_us->first_section_img = $request->input('first_section_img');
            $about_us->parallax_title = $request->input('parallax_title');
            $about_us->parallax_text = $request->input('parallax_text');

            $about_us->parallax_first_box_img = $request->input('parallax_first_box_img');
            $about_us->parallax_second_box_img = $request->input('parallax_second_box_img');
            $about_us->parallax_third_box_img = $request->input('parallax_third_box_img');

            $about_us->parallax_first_box_title = $request->input('parallax_first_box_title');
            $about_us->parallax_second_box_title = $request->input('parallax_second_box_title');
            $about_us->parallax_third_box_title = $request->input('parallax_third_box_title');

            $about_us->parallax_first_box_text = $request->input('parallax_first_box_text');
            $about_us->parallax_second_box_text = $request->input('parallax_second_box_text');
            $about_us->parallax_third_box_text = $request->input('parallax_third_box_text');

            $about_us->video_img = $request->input('video_img');
            $about_us->video_url = $request->input('video_url');
            $about_us->video_text = $request->input('video_text');

            $about_us->end_title = $request->input('end_title');
            $about_us->end_text = $request->input('end_text');

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
