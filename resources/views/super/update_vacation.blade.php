@extends('layouts.menu')

@section('content')
<div class="container">
    <div class="card-header">
        <h2>{{ __('Vacations') }}</h2>
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
                <form action="{{ route('posts_vacation.update', $userPost[0]->id) }}" method='POST'>
                    @csrf
                    @method('PUT')
                <div class="form-group">
                    <label for='user'>Cleaner Name</label>
                    <input type="text" name="user" id="user" class="form-control" value="{{ $userPost[0]->first_name }}" disabled>
                </div>
                <div class="form-group">
                    <label for="start_date">Leave</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{$userPost[0]->start_date}}">
                </div>
                <div class="form-group">
                    <label for="end_date">Arrive</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{$userPost[0]->end_date}}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="/tables" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
