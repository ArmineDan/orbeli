<?php

namespace App\Http\Controllers\Admin;

use App\NotFound;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App;
use App\Lang;

class NotFoundController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(NotFound $notFound)
    {
        //
    }

    // NotFound $notFound
    public function edit($id, $locale)
    {
        $notFound = NotFound::find($id);
        // return $notFound;
        return view('admin.notfound.edit', [
            'locale' => $locale,
            'notFound' => $notFound,
        ]);
    }

    // NotFound $notFound
    public function update(Request $request,$id, $locale )
    {
        $notFound = NotFound::on('mysql2')->findOrFail($id);
        $notFound->update($request->all());
        return redirect()->back();
    }

    public function destroy(NotFound $notFound)
    {
        //
    }
}
