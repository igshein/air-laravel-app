<?php

namespace App\Modules\Blogger\Model;

use Illuminate\Database\Eloquent\Model;

class Blogger extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'blogger_id';
    protected $table = 'blogger';
    protected $fillable = [
        'blogger_id', 'blogger_name'
    ];
}
