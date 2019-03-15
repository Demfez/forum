@extends('layouts.main')

@section('title', $thread->thread_name)

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <b>{{ $thread->thread_name }}</b>
                </div>
                <div class="card-body">
                    {!! $thread->content !!}
                </div>
            </div>
        </div>
    </div>
    @if(count($thread->answers))
        @foreach($thread->answers as $answer)
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            {{ $answer->user->name }}<br>
                            <img src="{{ asset("storage/uploads/".$answer->user->user_photo) }}" class="img-thumbnail" style="max-width:120px">
                            {{ $answer->text }}
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    @endif
    <br>
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ url('thread_'.$thread->id.'') }}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="thread_answer">Answer:</label>
                    <textarea name="thread_answer" class="form-control" id="thread_answer">{{ old('thread_answer') }}</textarea>
                </div>

                <input type="submit" value="Send" class="btn btn-outline-success">
            </form>
        </div>
    </div>
</div>

@endsection