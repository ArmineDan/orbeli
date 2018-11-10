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
    
}
