@extends('layouts.menu')


@section('content')
<div class="container">
    <div class="card-header">
        <h2>{{ __('Update Cleaner Duties') }}</h2>
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
                <form action="{{route('posts_duties.update', $userPost[0]->id)}}" method="POST" >
                    <div class="form-group">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="user">Cleaners</label>
                            <input type="text" name="user" id="user" class="form-control" value="{{ $userPost[0]->first_name }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="rooms_number">Room Number</label>
                            <input type="number" class="form-control" id="rooms_number" name="rooms_number" value="{{ $userPost[0]->rooms_number }}">
                        </div>
                        <div class="form-group">
                            <label for="start_date">Date</label>
                            <input type="text" class="form-control" id="start_date" name="start_date" value="{{ $userPost[0]->start_date }}" disabled>
                        </div>                      
                        <div class="form-group">
                            <label for="notes">Notes</label>
                            <textarea class="form-control" id="notes" name="notes">{{ $userPost[0]->notes }}</textarea>
                        </div>          
                        <input type="hidden" id="event_id">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Success</button>
                            <a href="/tables" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection


