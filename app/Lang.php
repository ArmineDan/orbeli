<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;
use App\Post;
use Illuminate\Support\Facades\DB; // Armen

class Lang extends Model
{

  static function getLangId() {
    // mi hat el ka, Narekinna, mek@ pahi myus@ jnji- Armen
      $lang= App::getLocale();     
      return  $lng = DB::table('langs')
      ->where('lng','=',$lang)
      ->value('id');  
  }
    
}
