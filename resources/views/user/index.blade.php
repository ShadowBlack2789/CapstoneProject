@extends('layouts.menu')

@section('links')
<!-- Links calendars -->
<link href="{{ asset('calendar/lib/main.css')}}" rel='stylesheet' />
<script src="{{ asset('calendar/lib/main.js')}}"></script>
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User View') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                
                    <div class="col">
                        <div 
                            id="calendar"
                        ></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
