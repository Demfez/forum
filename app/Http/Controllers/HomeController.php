<?php

namespace App\Http\Controllers;

use App\Thread;
use App\User;
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

    public function updateProfile(Request $request)
    {
        $request->validate([
            'user_email' => 'required|email|min:3|max:255',
        ]);
        $profile = User::find(Auth::id());

        $email = $profile->email;

        $profile->name = $request->input('user_name');
        $profile->email = $request->input('user_email');
        $profile->location = $request->input('user_location');
        $profile->bio = $request->input('user_bio');
        $profile->save();

        if ($email !== $request->input('user_email')) {
            $profile->email_verified_at = null;
            $profile->save();
        }

        return redirect('home');
    }
}
