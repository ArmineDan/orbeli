<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class SearchesController extends Controller
{
	public function getIndex( Request $request ) {
		$s = $request->query('s');
		
		// Query and paginate result
		$posts = Post::where('title', 'like', "%$s%")
				->orWhere('html_code', 'like', "%$s%")
				->paginate(3);

		return view('searches.index', ['posts' => $posts, 's' => $s ]);
	}
}
