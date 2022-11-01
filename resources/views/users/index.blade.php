@extends('layouts.main')
@section('content')
    @if ( session('store'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Saved Successfully!</strong>User has been successfully saved
            <button class="btn-close" type="button" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @if ( session('update'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Update Successfully!</strong>User has been successfully update
            <button class="btn-close" type="button" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @if ( session('destroy'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Delete Successfully!</strong>User has been successfully delete
            <button class="btn-close" type="button" data-bs-dismiss="alert"></button>
        </div>
    @endif
    <div class="card mb-5">
        <div class="card-body">
            <div class="row">
                <div class="col-auto">
                    <a href="{{route('users.create')}}" class="btn btn-primary">
                        <i class="fas fe-circle-plus"></i>Create New User
                    </a>
                </div>
            </div>
            <form method="POST" class="col-auto ms-auto">
                <div class="input-group">
                    <input type="text" id="search" name="search" class="form-control " value="{{request()->search}}"
                           placeholder="search name user ..."/>

                    <button type="button" class="btn btn-secondary">Search</button>
                </div>
            </form>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped table-hover m-0">
                <thead>
                <tr>
                    <th>S.No</th>
                    <th>Full Name</th>
                    <th>Birthday</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th width="280px">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->full_name}}</td>
                        <td>{{$user->birthday}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->address}}</td>
                        <td>
                            <a class="btn btn-info" href="{{route('users.show',$user->id)}}">Show</a>
                            <a class="btn btn-info" href="{{route('users.edit',$user->id)}}">Edit</a>
                            {{--<form action="{route('$users.destroy'}"></form>
                            <button class="btn btn-sm " type="button" data-url="{{route('$users.destroy',
                            ['user'=>$user->id])}}">Delete</button>--}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('modal')
    <div class="modal" tabindex="-1" id="modalDelate">
        <div class=" modal-body">
            <form action="#" method="post" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-trash"></i>
                    </h5>
                    <button class="btn-close" data-bs-dismis="modal" type="button"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('delete')
                    <p>Are yuo sure it will br deleted</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss>Cancel</button>
                    <button class="btn btn-danger" type="submit">Yes,Delete</button>
                </div>
            </form>
        </div>
    </div>
@endpush
@push('js')
    <script>
        $(function (){
            let modalDelete =new bootstrap.Modal($(#modalDelate));
            $('.delete').click(function (){
                let url = $(this).attr('data-url');
                $('#modalDelete form').attr('action', url);
                modalDelete.show();
            })
        })
    </script>
@endpush
@push('js')
    <script type="text/javascript">
        var route = "{{ url('autocomplete-search') }}";
        $('#search').typeahead({
            source: function (query, process) {
                return $.get(route, {
                    query: query
                }, function (data) {
                    return process(data);
                });
            }
        });
    </script>
@endpush

