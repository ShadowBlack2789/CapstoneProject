@extends('layouts.menu')

@section('content')
<div class="container">
    <div class="card-header">
        <h2>{{ __('Update Absent') }}</h2>
    </div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="container">
        <div class="card mb-3">
            <div class="card-body">
                <form action="{{route('posts_absent.update', $userPost[0]->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                <div class="form-group">
                    <label for="user_id">Cleaner Name</label>
                    <input type="text" class="form-control" id="user_id" name="user_id" value="{{$userPost[0]->first_name}}" disabled>
                </div>
                <div class="form-group">
                    <label for="start_date">Start</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{$userPost[0]->start_date}}">
                </div>
                <div class="form-group">
                    <label for="end_date">End</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{$userPost[0]->end_date}}">
                </div>
                    <button type="submit" class='btn btn-primary'>Submit</button>
                    <a href="/tables" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
