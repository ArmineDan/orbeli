<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Calendar;
class Event extends Model
{
    protected $fillable = ['title','start_date','end_date'];
    static function event() {
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
                        'url' => url('/archieve/'.$value->start_date),
                    ]
                );
            }            
        }
        return   $calendar = Calendar::addEvents($events);    
    }
    
    static function checkAndSaveIfNotExists($date) {
        $event = Event::having('start_date','=', $date)->get();
        if(count($event) == 0) {
            Event::create(['start_date' => $date, 'end_date' => $date]);
        }
    }
}