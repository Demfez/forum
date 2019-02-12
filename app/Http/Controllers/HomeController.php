<?php

namespace App\Http\Controllers;

use App\Threads;
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
    public function index(Threads $threads)
    {
        $threads = $threads->where('topic_starter', auth()->id())->get();

        return view('home')->with([
            'threads' => $threads
        ]);
    }
}
