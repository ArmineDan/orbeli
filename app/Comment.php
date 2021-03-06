<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = ['c_name', 'c_email', 'body', 'approved', 'lang_id', 'commentable_id', 'commentable_type'];
    public function commentable() {
      return $this->morphTo();
    }

    public function typeIs($type) {
      // $type = 'App\Post';
      $t = explode('\\', $type);
      $tend = end($t);
      $tlow = strtolower($tend);
      if($tlow === 'announcement'){
        $tlow = 'announcements';
      }
      // var_dump($tlow);
      return $tlow;
    }

    public function getRoute($type) {
      $t = explode('\\', $type);
      $tend = end($t);
      $tlow = strtolower($tend);
      if($tlow === 'announcement'){
        $tlow = 'announcements';
      }
      $troute = 'admin.'.$tlow.'.show';
      return $troute;
    }
    
}
