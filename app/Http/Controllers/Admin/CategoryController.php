<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App;
use Illuminate\Support\Facades\DB;
use App\Lang;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // shows list of category-data
        // return 'hello';
        return view('admin.categories.index')->with([
            'categories'=> Category::paginate(5),
            'locale' => App::getLocale(),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $locale)
    {
        $last_id_array = DB::select("SELECT  AUTO_INCREMENT
                        FROM    information_schema.TABLES
                        WHERE   (TABLE_NAME = 'categories')
                        AND table_schema=DATABASE()");

        // return $last_id_array;
        $last_id = $last_id_array[0]->AUTO_INCREMENT;
        $lang_id = Lang::getLangId();
        // return $lang_id;
        // return $last_id;
        return view('admin.categories.create',[
            'locale' => $locale,
            'last_id' => $last_id,
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
        // return $request->all();
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->lang_id = $request->lang_id;
        $category->save();
        return redirect()->route('admin.category.index', $locale);        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($cat_id, $locale)
    {
        $category = Category::findOrFail($cat_id);
        return view('admin.categories.edit', [
            'category' => $category,
            'locale' => $locale,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cat_id, $locale)
    {
        // return $request->all();
        $keys = ['created_at', 'updated_at', 'id'];
        $category = Category::findOrFail($request->id);
        // return $category;
        $category->update($request->except($keys));
        return redirect()->route('admin.category.index', $locale);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($cat_id, $locale)
    {
        $category = Category::findOrFail($cat_id);
        // return $category;
        $category->delete();
        return redirect()->route('admin.category.index', $locale);
    }
}
