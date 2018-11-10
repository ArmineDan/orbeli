<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parralax extends Model
{
    protected $fillable = ['title', 'text', 'img', 'lang_id', 'link']; 
}
