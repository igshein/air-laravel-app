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
        $vectorOrder = $this->getVector($request);
        $this->checkSortOrder($bloggersEvent, $vectorOrder, $request->input('blogger_id'));
        $reorderBloggersEvent = $this->reordering($bloggersEvent, $request->input('blogger_id'), $vectorOrder);
        $this->updateBloggersEvent($reorderBloggersEvent, $request->input('event_id'));
    }

    private function checkSortOrder(array $bloggersEvent, int $vectorOrder, $bloggerId): void
    {
        if ($vectorOrder === -1) {
            if ($bloggersEvent[0]['blogger_id'] == $bloggerId) {
                throw new \Exception('This order cannot be up.');
            }
        }
        if ($vectorOrder === 1) {
            $lastKey = count($bloggersEvent) - 1;
            if ($bloggersEvent[$lastKey]['blogger_id'] == $bloggerId) {
                throw new \Exception('This order cannot be down.');
            }
        }
    }

    private function getVector(Request $request): int
    {
        $vectorOrder = (int)$request->input('vector');
        $validVectors = [1, -1];
        if (!in_array($vectorOrder, $validVectors)) {
            throw new \Exception('Value vectorOrder not valid');
        }
        return $vectorOrder;
    }

    private function reordering(array $bloggersEvent, int $bloggerId, int $vector): array
    {
        $keyUpdate = null;
        $reorderBloggersEvent = [];
        foreach ($bloggersEvent as $key => $bloggerEvent) {
            if ($bloggerEvent['blogger_id'] == $bloggerId) {
                $bloggerEvent['blogger_event_order'] = $bloggerEvent['blogger_event_order'] + $vector;
                $keyUpdate = $key + $vector;
            }
            $reorderBloggersEvent[] = $bloggerEvent;
        }
        $reorderBloggersEvent[$keyUpdate]['blogger_event_order'] = $reorderBloggersEvent[$keyUpdate]['blogger_event_order'] - $vector;
        return $reorderBloggersEvent;
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
