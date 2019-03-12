@extends('layouts.main')

@section('title', 'Account')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><b>Profile</b></div>

                <div class="card-body">
                    <form enctype="multipart/form-data" method="POST" action="{{ url('home') }}">
                        @csrf
                        <div class="form-group">
                            <label for="user_photo">Photo:</label>
                            <input type="file" accept=".jpg, .jpeg, .png, .svg" name="user_photo" id="user_photo" >
                        </div>
                        <div class="form-group">
                            <label for="user_name">Name:</label>
                            <input type="text" name="user_name" class="form-control" id="user_name" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="user_email">Public email:</label>
                            <input type="text" name="user_email" class="form-control" id="user_email" value="{{ $user->email }}" data-toggle="tooltip" data-placement="left" title="You need to re-validate your email if you change it">
                        </div>
                        <div class="form-group">
                            <label for="user_location">Location:</label>
                            <input type="text" name="user_location" class="form-control" id="user_location" value="{{ $user->location }}">
                        </div>
                        <div class="form-group">
                            <label for="user_bio">Bio:</label>
                            <textarea name="user_bio" class="form-control" id="user_bio">{{ $user->bio }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-outline-info">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><b>Dashboard</b></div>

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
                                    <td><form method="POST" action="/thread_{{ $thread->id }}">

                                            @csrf

                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">Delete</button>


                                        </form>
                                    </td>
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


<!-- Modal for delete thread-->

@endsection
