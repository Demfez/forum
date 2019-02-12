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
</div>

@endsection