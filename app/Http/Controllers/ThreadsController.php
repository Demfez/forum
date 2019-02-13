<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Http\Request;

class ThreadsController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $threads = Thread::orderBy('updated_at', 'DESC')->get();
        return view('all_threads')->with([
            'threads' => $threads
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_thread');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $validated = request()->validate([
            'thread_name' => 'required|min:3|max:255|unique:threads',
            'content' => 'required'
        ]);

        $validated['topic_starter'] = auth()->id();

        Thread::create($validated);

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show(Thread $thread)
    {
        return view('show_thread',[
            'thread' => $thread
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        return view('edit_thread')->with([
            'thread' => $thread
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Thread $thread)
    {
        $validated = request()->validate([
            'thread_name' => 'required|min:3|max:255',
            'content' => 'required'
        ]);

        $thread->update($validated);

        return redirect('/thread_'.$thread->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Redirect
     */
    public function delete(Thread $thread)
    {
        Thread::destroy($thread->id);

        return redirect('/home');
    }
}
