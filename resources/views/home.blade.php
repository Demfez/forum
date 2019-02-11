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

                    You are logged in!
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
