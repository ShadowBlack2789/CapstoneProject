@extends('layouts.menu')

@section('content')
<div class="container">
    <div class="card-header" >
        <h2>{{ __('Edit User') }}</h2>
    </div>

    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
    </div>

    <div class="jumbotron">

        {!! Form::open(['action' => ['SupervisorController@update', $userPost->id], 'method'=> 'PUT']) !!}
        @csrf
            <div class='form-row'>
                <div class="col">
                    {{Form::label('first_name', 'First Name')}}
                    {{Form::text('first_name', $userPost->first_name, ['class'=> 'form-control', 'placeholder'=> 'First Name'])}}
                </div>
                <div class="col">
                    {{Form::label('last_name', 'Last Name')}}
                    {{Form::text('last_name', $userPost->last_name, ['class'=> 'form-control', 'placeholder'=> 'Last Name'])}}
                </div>
            </div>
            <div class="form-group">
                {{Form::label('email', 'Email')}}
                {{Form::text('email', $userPost->email, ['class'=>'form-control', 'placeholder' => 'Email'])}}
            </div>
            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
            <a href="/admin_dashboard" class="btn btn-danger">Cancel</a>
        {!! Form::close() !!}
    </div>
</div>
@endsection

