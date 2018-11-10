<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Calendar;
use Session;
use App;

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
        $events = [];
        $data = Event::all();
 
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
        $event = Event::having('start_date','=', $date)->get();
        if(count($event) == 0) {
            Event::create(['start_date' => $date, 'end_date' => $date]);
        }
    }
}