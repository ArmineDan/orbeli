<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Calendar;
use Session;
use App;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Self_;

class Event extends Model
{
    protected $fillable = ['title','start_date','end_date', 'lang_id'];
    static function event($locale) {
        $rules = ['en','ru','hy'];                      
        if(in_array($locale,$rules))
        {
               Session::put('locale',$locale);
                App::setLocale($locale);
                $lang = App::getLocale(); 
                $lng = DB::table('langs')
                ->where('lng','=',$lang)
                ->value('id');
                
        $events = [];
        //$data = Event::all();
        $data = DB::table("events")->where('lang_id','=',$lng)->get();
       
 
        if($data->count()) {
        
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.' +1 day'),
                    null,
                    // Add color and link on event
                    [
                        'color' => '#f05050',
                        'url' => url($lang.'/archieves/'.$value->start_date),
                    ]
                );
            }            
        }
        return   $calendar = Calendar::addEvents($events);   
       } 
       else{              
        return  redirect('/'.App::getLocale());
        }       
    }
    

    static function checkAndSaveIfNotExists($date, $lang_id) {
        // $event = Event::having('start_date','=', $date)->get();
        $event = Event::where('lang_id','=', $lang_id)->having('start_date','=', $date)->get();
      if(count($event) == 0) {
            Event::on('mysql2')->create(['start_date' => $date, 'end_date' => $date, 'lang_id' => $lang_id]);
        }
    }

    static function dateHasOtherEvents($date, $lang_id) {
        // '2018-11-10'
        $ns = DB::table('news')->select('id')->whereDate('date', $date)->where('lang_id', '=', $lang_id)->get();
        $ps = DB::table('posts')->select('id')->whereDate('date', $date)->where('lang_id', '=', $lang_id)->get();
        $vd = DB::table('videos')->select('id')->whereDate('date', $date)->where('lang_id', '=', $lang_id)->get();
        $op = DB::table('opinions')->select('id')->whereDate('date', $date)->where('lang_id', '=', $lang_id)->get();
        $an = DB::table('announcements')->select('id')->whereDate('date', $date)->where('lang_id', '=', $lang_id)->get();

        if(count($vd) > 0 || count($op) > 0 || count($ns) > 0 || count($an) > 0 || count($ps) > 0) {
            // 'dont touch Event-date <br>';
            return true;
        }else{
            // 'let delete Event-date <br>';
            return false;
        }
    }

    static function checkAndDeleteEventDate($date, $lang_id) {
        $events = Event::where('lang_id','=', $lang_id)->having('start_date','=', $date)->get(); // all collected into array
        $event = Event::where('lang_id','=', $lang_id)->having('start_date','=', $date)->first(); // first elem of collection
        if(count($events) > 0) {
            // return $event;
            if(!self::dateHasOtherEvents($date, $lang_id)) {
                Event::on('mysql2')->find($event->id)->delete();
            }            
        }
    }
}