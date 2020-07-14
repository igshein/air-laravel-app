<?php

namespace App\Modules\Blogger\Model;

use Illuminate\Database\Eloquent\Model;

class BloggerAvatar extends Model
{
    public $timestamps = false;
    protected $table = 'blogger_avatar';
    protected $primaryKey = 'blogger_avatar_id';
    protected $fillable = [
        'blogger_id', 'blogger_avatar_path'
    ];
}
