<?php

namespace App\Http\Controllers;

use App\Answers;
use App\Http\Requests\ThreadValidation;
use App\Thread;
use Gate;
use Illuminate\Http\Request;


class ThreadsController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * Display a listing of the threads.
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
     * Show the form for creating a new thread.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_thread');
    }

    /**
     * Store a newly created thread in storage.
     *
     * @param ThreadValidation $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ThreadValidation $request)
    {
        $validated = $request->validated();
        $validated['topic_starter'] = auth()->id();

        Thread::create($validated);

        return redirect('/home');
    }

    public function storeAnswer(Thread $thread)
    {

        $validated = request()->validate([
            'thread_answer' => 'required|min:3'
        ]);

        $validated['text'] = request()->input('thread_answer');
        $validated['thread_id'] = $thread->id;
        $validated['user_id'] = auth()->id();

        Answers::create($validated);

        $thread->comments_count++;
        $thread->save();

        return redirect()->back();
    }

    /**
     * Display the specified thread.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show(Thread $thread)
    {
        return view('show_thread', [
            'thread' => $thread
        ]);
    }

    /**
     * Show the form for editing the specified thread.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        //abort_if($thread->topic_starter !== auth()->id(), 403); //easy way without policies

        abort_if(Gate::denies('update', $thread), 403);

        return view('edit_thread')->with([
            'thread' => $thread
        ]);
    }

    /**
     * Update the specified thread in storage.
     *
     * @param Thread $thread
     * @param ThreadValidation $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Thread $thread, ThreadValidation $request)
    {

        abort_if(Gate::denies('update', $thread), 403);

        $validated = $request->validated();

        $thread->update($validated);

        return redirect('/thread_'.$thread->id.'/edit');
    }

    /**
     * Remove the specified thread from storage.
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
