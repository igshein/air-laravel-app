<?php

namespace App\Modules\Event\Model;

use Illuminate\Database\Eloquent\Model;

class EventDateYear extends Model
{
    public $timestamps = false;
    protected $table = 'event_date_year';
    protected $primaryKey = 'event_date_year_id';
    protected $fillable = [
        'event_date_year_id', 'event_date_number_year', 'event_date_mouth_id'
    ];

    public function mouth()
    {
        return $this
            ->hasMany(
                'App\Modules\Event\Model\EventDateMouth',
                'event_date_mouth_id',
                'event_date_mouth_id'
            )->with('day');
    }
}
