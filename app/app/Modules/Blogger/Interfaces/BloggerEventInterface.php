<?php

namespace App\Modules\Blogger\Interfaces;

use Illuminate\Http\Request;

interface BloggerEventInterface
{
    public function reorder(Request $request): void;
}
