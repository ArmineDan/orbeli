<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['name','link','type','post_id'];

    static function prepareFile($link) {
        $fl_one=[];
        // $link = "files/1/posts/pdf-test.pdf";
        $fl_one['link'] = trim($link);

        $explode_link = explode("/", $link);
        $file_name = end($explode_link);
        // var_dump($file_name);
        $fl_one['name'] = trim($file_name);

        $exploded_file = explode(".",$file_name);
        $file_type = end($exploded_file);
        // var_dump($file_type);
        $fl_one['type'] = trim($file_type);
        return $fl_one;

        // 0       	
        // link	"files/1/posts/file_name.pdf"
        // name	"file_name.pdf"
        // type	"pdf"
        // 1	
        // link	"files/1/posts/file_name.doc"
        // name	"file_name.doc"
        // type	"doc"
        // 2	
        // link	"files/1/posts/file_name.fb2"
        // name	"file_name.fb2"
        // type	"fb2"

        /* for_store: $post->getFiles()->create(File::prepareFile($link));*/
    }
}
