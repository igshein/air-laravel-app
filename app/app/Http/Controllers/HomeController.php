<?php

namespace App\Http\Controllers;

use App\Modules\Event\Model\EventDateYear;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $results = EventDateYear::with('mouth')->get();

        return view('home', compact('results'));
    }
}
