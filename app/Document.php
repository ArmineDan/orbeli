<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{

    protected $fillable = ['name','link','type','documentable_id','documentable_type','inused'];    

    /* Получить все модели, обладающие documentable. */   
    public function documentable() {
        return $this->morphTo();
    }

    /*
    Отношение documentable() модели Document вернёт либо объект Post, либо объект Opinion
    $document = App\Document::find(1);
    $documentable = $document->documentable;    
    */

    static function prepareDocParams($link) {
    
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
    }

    static function getTypeFromLink($link) {
        $item = self::prepareDocParams($link);
        return $item['type'];
    }

    // from on create Post
    // if($request->input('files')) {
        //     // files are already empty          
        //     $fl_string = $request->input('files');
        //     $fl_array = explode(',',$fl_string);
        //     // $fl_rows =[]; // fot debugging
        //     foreach($fl_array as $key => $link) {
        //         // $fl_rows[$key] = File::prepareFile($link);
        //         $post->getDocuments()->create(Document::prepareDocParams($link));
        //     }
        //     // return $fl_rows;
        // }


}
