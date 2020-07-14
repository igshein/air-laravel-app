<?php

namespace App\Modules\Event\Model;

use Illuminate\Database\Eloquent\Model;

class EventDateDay extends Model
{
    public $timestamps = false;
    protected $table = 'event_date_day';
    protected $primaryKey = 'event_date_day_id';
    protected $fillable = [
        'event_date_day_id', 'event_date_number_day', 'event_id'
    ];

    public function bloggerEvent()
    {
        return $this
            ->hasMany(
                'App\Modules\Blogger\Model\BloggerEvent',
                'event_id',
                'event_id'
            )
            ->leftJoin('event', 'blogger_event.event_id', '=', 'event.event_id' )
            ->leftJoin('blogger', 'blogger_event.blogger_id', '=', 'blogger.blogger_id' )
            ->orderBy('blogger_event_order', 'asc');
    }
}
