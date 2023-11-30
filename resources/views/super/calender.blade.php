@extends('layouts.menu')


@section('content')

<div class="container">
    <div class="card-header">
        <h2>{{ __('Calender View') }}</h2>
    </div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="row">
            <div class="col">
                <div
                    id='calendar',
                    data-route-load-events="{{ route('routeLoadEvents')}}"
                ></div>
            </div>
           
        </div>
    </div>
</div>
@endsection

