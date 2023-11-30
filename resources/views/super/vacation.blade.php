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
                {!! Form::open(['action' => 'VactionController@store', 'method' => 'POST']) !!}
                <div class="form-group">
                    {{Form::label('first_name', 'Cleaner Name')}}
                    {{Form::select('user_id', $vacations, null, ['class' => 'custom-select d-block w-100'])}}
                </div>
                <div class="form-group">
                    {{Form::label('start_date', 'Leave')}}
                    {{Form::date('start_date', \carbon\carbon::now(), ['class'=> 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('end_date', 'Arrive')}}
                    {{Form::date('end_date', \carbon\carbon::now(), ['class'=> 'form-control'])}}
                </div>
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                <a href="/tables" class="btn btn-danger">Cancel</a>
                {!! Form::close() !!}    
            </div>
        </div>
    </div>

</div>
@endsection
