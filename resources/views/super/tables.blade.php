@extends('layouts.menu')

@section('content')

<div class="container">
    <div class="card-header">
        <h2>{{ __('Tables View') }}</h2>
    </div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        
        <div class="form-group">
          <a href="{{route('task')}}" class="btn btn-primary">Add Task</a>
          <a href="{{route('vacation') }}" class="btn btn-warning">Vacation</a>
          <a href="{{route('absents')}}" class="btn btn-danger">Absents</a>
        </div>
 
        <!-- Main content -->
        <div class="content">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <div>
                <table class="table table-bordered border-danger table-hover">
                  <thead class="thead table-dark">
                    <tr>
                        <th scope='col' class="text-center">#</th>
                        <th scope='col'>Name</th>
                        <th scope="col" class="text-center">Selection</th>
                    </tr>
                  </thead>
                  
                  @foreach ($userNames as $userName)
                  <tbody>
                    <tr>
                      <td class="text-center">{{ $userName->id }}</td>
                      <td>{{ $userName->first_name }}</td>
                      <td class="text-center">
                        <a href="{{ route('dutieSelect', $userName->id) }}" class="badge badge-primary">Task</a>
                        <a href="{{ route('vacationSelect', $userName->id) }}" class="badge badge-warning">Vacation</a>
                        <a href="{{ route('absentSelect', $userName->id) }}" class="badge badge-danger">Absents</a>
                      </td>
                    </tr>
                  </tbody>
                  @endforeach
                </table>
              </div>
            </div>
          </div>
        </div>
        
    </div>
</div>
@endsection

