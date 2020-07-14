<?php

namespace App\Modules\Event\Model;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $timestamps = false;
    protected $table = 'event';
    protected $primaryKey = 'event_id';
    protected $fillable = [
        'event_id', 'event_name', 'event_time'
    ];
}
