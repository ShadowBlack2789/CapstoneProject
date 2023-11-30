@extends('layouts.menu')


@section('content')
<div class="container">
    <div class="card-header">
        <h2>{{ __('Cleaner Duties') }}</h2>
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
                <form action="{{route('posts_duties.store')}}" method="POST" >
                    <div class="form-group">
                        @csrf
                        <div class="form-group">
                            <label for="user">Cleaners</label>
                            <select id="user_id" class="form-control" name="user_id">
                                <option value="0">Select Cleaner</option>
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->first_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="rooms_number">Room Number</label>
                            <input type="number" class="form-control" id="rooms_number" name="rooms_number">
                        </div>
                        <div class="form-group">
                            <label for="start_date">Date</label>
                            <input type="text" class="form-control" id="start_date" name="start_date">
                        </div>                      
                        <div class="form-group">
                            <label for="notes">Notes</label>
                            <textarea class="form-control" id="notes" name="notes"></textarea>
                        </div>          
                        <input type="hidden" id="event_id">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">
                                Success
                            </button>
                            <a href="/tables" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection

@section('DatePickeScript')
<script>
    $(function() {
      $('input[name="start_date"]').daterangepicker({
        singleDatePicker: true,
        timePicker: true,
        startDate: moment().startOf('hour'),
        endDate: moment().startOf('hour').add(32, 'hour'),
        locale: {
          format: 'YYYY-MM-DD hh:mm A'
        }
      });
    });
    </script>
@endsection
