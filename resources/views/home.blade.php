@extends('layouts.main')

@section('title', 'Account')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(count($threads) > 0)
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Comments</th>
                                    <th></th>
                                </tr>
                            </thead>

                            @foreach($threads as $thread)
                                <tr>
                                    <td>{{ $thread->id }}</td>
                                    <td><a href="{{ url('thread_'.$thread->id) }}">{{ $thread->thread_name }}</a></td>
                                    <td>{{ $thread->content }}</td>
                                    <td>{{ $thread->comments_count }}</td>
                                    <td><a class="btn btn-info" href="{{ url('thread_'.$thread->id.'/edit') }}" role="button">Edit</a></td>
                                </tr>
                            @endforeach

                        </table>
                    @else
                        <p>You don't have any threads</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 create-thread">
            <a class="btn btn-outline-info" href="{{ url('/create_thread') }}" role="button">Create thread</a>
        </div>
    </div>
</div>
@endsection
