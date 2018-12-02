<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotFound extends Model
{
    //
    protected $table = 'not_found';
    protected $fillable = ['error_text', 'lang_id'];
}
