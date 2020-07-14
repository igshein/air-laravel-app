<?php

namespace App\Modules\Event\Model;

use Illuminate\Database\Eloquent\Model;

class EventDateMouth extends Model
{
    public $timestamps = false;
    protected $table = 'event_date_mouth';
    protected $primaryKey = 'event_date_mouth_id';
    protected $fillable = [
        'event_date_mouth_id', 'event_date_number_mouth', 'event_date_day_id'
    ];

    public function day()
    {
        return $this
            ->hasMany(
                'App\Modules\Event\Model\EventDateDay',
                'event_date_day_id',
                'event_date_day_id'
            )->with('bloggerEvent');
    }
}
