<?php
namespace App\Http\Controllers\Admin;

use App\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use DB;
use App;    
use App\Lang;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $folder_name = "partners";

    public function index()
    {
        $lang_id = Lang::getLangId();
        $partner = Partner::orderBy('id','desc')->where('lang_id',$lang_id)->paginate(3);
        return view('admin.partners.index',[
            'locale' => App::getLocale(),
            'partner' => $partner,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $last_id_array = DB::select("SELECT  AUTO_INCREMENT
                                FROM    information_schema.TABLES
                                WHERE   (TABLE_NAME = 'partners')");

        $last_id = $last_id_array[0]->AUTO_INCREMENT;
        // return $last_id;
        $lang_id = Lang::getLangId();
        // return $lang_id;

        $folder_name = $this->folder_name;

        $images = Storage::files('public/'.$folder_name.'/'.$last_id);
        // return $images;
        $imageurls = [];
        for ($i=0; $i < count($images); $i++) {
            $imageurls[$i]['url'] = Storage::url($images[$i]);
            $imageurls[$i]['size'] = $size = Storage::size($images[$i]);
        }
        return view("admin.partners.create",[
            'locale' => \App::getLocale(),
            'last_id' =>$last_id,
            'folder_name' =>$folder_name,
            'imageurls' => $imageurls,
            'lang_id' =>$lang_id,
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
        //return $locale;
        $this->validate($request,[
            'name' => 'required',
            'url' => 'required',
            'text' => 'required',
            'logo' => 'required',
            'lang_id' => 'required',
        ]);
        $partner = new Partner;

        $paraParams = [
            'p_name' => $request->input('name'),
            'url' => $request->input('url'),
            'text' => $request->input('text'),
            'logo' => $request->input('logo'),
            'lang_id' => $request->input('lang_id'),
        ];

        DB::connection('mysql2')->table('partners')->insert( $paraParams );

        return redirect()->route('admin.partners.index', App::getLocale());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $locale)
    {

        $lang_id = Lang::getLangId();
        $images = Storage::files('public/'.$this->folder_name.'/'.$id);

        $imageurls = [];
        for ($i=0; $i < count($images); $i++) {
            $imageurls[$i]['url'] = Storage::url($images[$i]);
            $imageurls[$i]['size'] = $size = Storage::size($images[$i]);
        }
    
        $partner = Partner::find($id);
        App::setLocale($locale);
        
        return view('admin.partners.edit',[
            'partner' => $partner,
            'locale'=> $locale,
            'last_id' => $id,
            'folder_name' => $this->folder_name,
            'imageurls' => $imageurls,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $locale)
    {
        $this->validate($request,[
            'name' => 'required',
            'url' => 'required',
            'text' => 'required',
            'logo' => 'required',
        ]);
        
        $partner = Partner::on('mysql2')->find($id);
            $partner->p_name = $request->input('name');
            $partner->url = $request->input('url');
            $partner->text = $request->input('text');
            $partner->logo = $request->input('logo');
        $partner->save();

        return redirect()->route('admin.partners.index', $locale)->with('success','Post Created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $locale)
    {
        $partner = Partner::on('mysql2')->find($id);
        $partner->delete();
        return redirect()->route('admin.partners.index', $locale);
    }
}
