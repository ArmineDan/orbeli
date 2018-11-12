<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use App\Author;

class Category extends Model
{
   protected $fillable = ['name', 'lang_id'];
}
