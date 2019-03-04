@extends('layouts.main')

@section('title', 'All threads')

@section('content')
<div class="container">
    <div class="row">

@if(count($threads))
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Comments</th>
        </tr>
        </thead>
        @foreach($threads as $thread)
            <tr>
                <td><a href="{{ url('thread_'.$thread->id) }}">{{ $thread->thread_name }}</a></td>
                <td>{{ $thread->content }}</td>
                <td>{{ $thread->comments_count }}</td>
            </tr>
        @endforeach
    </table>
@else
    <p>We don't have any threads</p>
@endif

    </div>
</div>

@endsection