@extends('layouts.main')
@section('content')
    @if ( session('store'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Saved Successfully!</strong>User has been successfully saved
        </div>
    @endif
    @if ( session('update'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Update Successfully!</strong>User has been successfully update
        </div>
    @endif
    @if ( session('destroy'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Delete Successfully!</strong>User has been successfully delete
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
                <form action="?" class="col-auto ms-auto">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control " value="{{request()->search}}"
                               placeholder="search name user ..."/>
                        <button type="submit" class="btn btn-secondary">Go!</button>
                    </div>
                </form>
            </div>
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
                            <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                <a class="btn btn-info" href="{{route('users.show',$user->id)}}">Show</a>
                                <a class="btn btn-info" href="{{route('users.edit',$user->id)}}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-info">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
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

