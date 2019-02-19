@extends('layouts.main')

@section('title', 'Create new thread')

@section('content')

    <div class="container">
        <div class="row">
            <form method="POST" action="{{ url('/create_thread') }}" id="create-thread-form">
                @csrf
                <div class="form-group">
                    <label for="thread_name">Title:</label>
                    <input type="text" name="thread_name" class="form-control" id="thread_name" value="{{ old('thread_name') }}">
                </div>
                <div class="form-group">
                    <label for="content">Content:</label>
                    <textarea class="form-control" name="content" id="content" rows="10">{{ old('content') }}</textarea>
                </div>
                <input type="submit" value="Create" class="btn btn-outline-info">
            </form>
        </div>
    </div>

@endsection