<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\Blogger\Interfaces\BloggerEventInterface;

class BloggerEventController extends Controller
{
    private $bloggerEventService;

    public function __construct(BloggerEventInterface $bloggerEventService)
    {
        $this->middleware('auth');
        $this->bloggerEventService = $bloggerEventService;
    }

    public function reorder(Request $request)
    {
        $this->bloggerEventService->reorder($request);
        return redirect()->route('home');
    }
}
