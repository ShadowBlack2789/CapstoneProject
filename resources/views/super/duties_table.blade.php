@extends('layouts.menu')


@section('content')
<div class="container">
    <div class="card-header">
        <h2>{{ __('Duties') }}</h2>
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
            <div class="card-header">
                <h3>{{$userSelected[0]->first_name}}</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="thead bg-dark">
                        <tr>
                            <th scope='col'>Dates Start</th>
                            <th scope='col'>Dates End</th>
                            <th scope='col'>Notes</th>
                            <th scope="col">Completion</th>
                            <th></th>
                        </tr>
                    </thead>
                    @foreach($userSelected as $user)
                    <tbody>
                        <tr>
                            <td>{{$user->start_date}}</td>
                            <td>{{$user->end_date}}</td>
                            <td>{{$user->notes}}</td>
                            <td></td>
                            <td class="text-center">
                                <a href="/posts_duties/{{ $user->id }}/edit">
                                    <img src="{{ asset('menu/dist/img/pencil.png') }}" alt="Logo" style="opacity: .8 height: 25px; width: 25px;">
                                </a>
                                <a data-toggle="modal" data-user="{{route('posts_duties.destroy', $user->id)}}" id="delete" data-target="#deleteModal">
                                    <img src="{{ asset('menu/dist/img/delete.svg') }}" alt="Logo" style="opacity: .8 height: 25px; width: 25px;">
                                </a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title" style='color:black'><strong>Delete User</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('posts_duties.destroy', 'test')}}" method="POST" id="deleteFormUser">
                    @method('DELETE')
                    @csrf 
                    <div class="modal-body">
                        <p class="text-center">
                            Are you sure want to delete this user?
                         </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">No, Cancel</button>
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection

@section('DeleteUser')
    <script> 
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) 
            var recipient = button.data('user')
            var modal = $(this)
            $('#deleteFormUser').attr('action', recipient);           
        })
    </script>
@endsection