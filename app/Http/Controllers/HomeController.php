<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @param Thread $threads
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Thread $threads)
    {
        $user = Auth::user();
        $threads = $threads->where('topic_starter', auth()->id())->get();

        return view('home')->with([
            'threads' => $threads,
            'user' => $user
        ]);
    }
}
