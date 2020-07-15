<?php

namespace App\Modules\Blogger\Service;

use App\Modules\Blogger\Model\BloggerEvent;
use Illuminate\Http\Request;
use App\Modules\Blogger\Interfaces\BloggerEventInterface;
use Illuminate\Support\Facades\DB;


class BloggerEventService implements BloggerEventInterface
{
    public function reorder(Request $request): void
    {
        $bloggersEvent = BloggerEvent::select("event_id", "blogger_id", "blogger_event_order")
                    ->where('event_id', $request->input('event_id'))
                    ->orderBy('blogger_event_order', 'asc')
                    ->get()
                    ->toArray();
        if ($request->input('vector') === 'up') {
            $reorderBloggersEvent = $this->reorderUp($bloggersEvent, $request->input('blogger_id'));
        }
        if ($request->input('vector') === 'down') {
            $reorderBloggersEvent = $this->reorderDown($bloggersEvent, $request->input('blogger_id'));
        }
        // reordering
        $this->updateBloggersEvent($reorderBloggersEvent, $request->input('event_id'));
    }

    private function reorderUp(array $bloggersEvent, int $bloggerId): array
    {
        $num = -1;
        $keyUpdate = null;
        $reorderBloggersEvent = [];
        foreach ($bloggersEvent as $key => $bloggerEvent) {
            if ($bloggerEvent['blogger_id'] == $bloggerId) {
                // $bloggerEvent['blogger_event_order']--;
                $bloggerEvent['blogger_event_order'] = $bloggerEvent['blogger_event_order'] + $num;
                $keyUpdate = $key + $num;
            }
            $reorderBloggersEvent[] = $bloggerEvent;
        }
        // $reorderBloggersEvent[$keyUpdate]['blogger_event_order']++;
        $reorderBloggersEvent[$keyUpdate]['blogger_event_order'] = $reorderBloggersEvent[$keyUpdate]['blogger_event_order'] - $num;
        return  $reorderBloggersEvent;
    }

    private function reorderDown(array $bloggersEvent, int $bloggerId): array
    {
        // dd($bloggersEvent);
        $num = 1;
        $keyUpdate = null;
        $reorderBloggersEvent = [];
        foreach ($bloggersEvent as $key => $bloggerEvent) {
            if ($bloggerEvent['blogger_id'] == $bloggerId) {
                // $bloggerEvent['blogger_event_order']++;
                $bloggerEvent['blogger_event_order'] = $bloggerEvent['blogger_event_order'] + $num;
                $keyUpdate = $key + $num;
            }
            $reorderBloggersEvent[] = $bloggerEvent;
        }
        //$reorderBloggersEvent[$keyUpdate]['blogger_event_order']--;
        $reorderBloggersEvent[$keyUpdate]['blogger_event_order'] = $reorderBloggersEvent[$keyUpdate]['blogger_event_order'] - $num;
        return  $reorderBloggersEvent;
    }

    private function updateBloggersEvent(array $reorderBloggersEvent, int $eventId): void {
        try {
            DB::beginTransaction();

            BloggerEvent::where('event_id', $eventId)->delete();
            BloggerEvent::insert($reorderBloggersEvent);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception($e);
        }
    }

}
