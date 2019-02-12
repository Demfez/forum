@extends('layouts.main')

@section('title', 'Edit thread: ' . $thread->thread_name)

@section('content')

    <div class="container">
        <div class="row">
            <form method="POST" action="{{ url('thread_'.$thread->id.'/edit') }}" id="create-thread-form">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="thread_name">Title:</label>
                    <input type="text" name="thread_name" class="form-control" id="thread_name" value="{{ $thread->thread_name }}">
                </div>
                <div class="form-group">
                    <label for="content">Content:</label>
                    <textarea class="form-control" name="content" id="content" rows="10">{{ $thread->content }}</textarea>
                </div>
                <input type="submit" value="Update" class="btn btn-outline-success">
            </form>
        </div>
    </div>

@endsection