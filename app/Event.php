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
    protected $fillable = ['title','start_date','end_date'];
    static function event($locale) {
        $rules = ['en','ru','hy'];                      
        if(in_array($locale,$rules))
        {
               Session::put('locale',$locale);
                App::setLocale($locale);
                $lang = App::getLocale(); 
                // $lng = DB::table('langs')
                // ->where('lng','=',$lang)
                // ->value('id');
                
        $events = [];
        $data = Event::all();
        // $data = DB::table("events")->where('lang_id','=',$lng)->get();
       
 
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
    
    static function checkAndSaveIfNotExists($date) {
        $event = Event::where('start_date','=', $date)->get();
        if(count($event) == 0) {
            Event::create(['start_date' => $date, 'end_date' => $date]);
        }
    }

    static function dateHasOtherEvents($date) {
        // '2018-11-10'
        $ps = DB::table('posts')->select('id')->whereDate('date', $date)->get();
        $vd = DB::table('videos')->select('id')->whereDate('date', $date)->get();
        $op = DB::table('opinions')->select('id')->whereDate('date', $date)->get();
        $ns = DB::table('news')->select('id')->whereDate('date', $date)->get();
        $an = DB::table('announcements')->select('id')->whereDate('date', $date)->get();

        if(count($vd) > 0 || count($op) > 0 || count($ns) > 0 || count($an) > 0 || count($ps) > 0) {
            // 'dont touch Event-date <br>';
            return true;
        }else{
            // 'let delete Event-date <br>';
            return false;
        }
    }

    static function checkAndDeleteEventDate($date) {
        $events = Event::having('start_date','=', $date)->get(); // all collected into array
        $event = Event::having('start_date','=', $date)->first(); // first elem of collection
        if(count($events) > 0) {
            // return $event;
            if(!self::dateHasOtherEvents($date)) {
                Event::find($event->id)->delete();
            }            
        }
    }
}