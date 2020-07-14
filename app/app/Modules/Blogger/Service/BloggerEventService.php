<?php

namespace App\Modules\Blogger\Service;

use App\Modules\Blogger\Model\BloggerEvent;
use Illuminate\Http\Request;
use App\Modules\Blogger\Interfaces\BloggerEventInterface;


class BloggerEventService implements BloggerEventInterface
{
    public function reorder(Request $request): void
    {
        $select = BloggerEvent::select()->where('event_id', $request->input('event_id'))->get();
        dd($select);
    }
}
