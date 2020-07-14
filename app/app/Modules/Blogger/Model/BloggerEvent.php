<?php

namespace App\Modules\Blogger\Model;

use Illuminate\Database\Eloquent\Model;

class BloggerEvent extends Model
{
    public $timestamps = false;
    protected $table = 'blogger_event';
    protected $primaryKey = 'blogger_event_id';
    protected $fillable = [
        'blogger_event_id', 'event_id', 'blogger_id', 'blogger_event_order'
    ];
}
