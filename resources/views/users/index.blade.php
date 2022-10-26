@extends('users.view')
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>List user</h2>
                </div>
                <div class="form-row">
                    <from action="/users.create" method="Post">
                        <div class="pull-right mb-2">
                            <a class="btn btn-success" href="/users.create">Create user</a>
                        </div>
                    </from>

                    <form method="POST" id="header-search " class="col-auto ms-auto">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control " value="{{request()->search}}"
                                   placeholder="search name user ..."/>
                            <button type="button" class="btn btn-secondary">Search</button>
                        </div>
                    </form>

                    <div id="search-suggest" class="s-suggest"></div>
                </div>
            </div>
        </div>
        @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
        @endif
        <table class=" table table-bordered">
            <tr>
                <th>S.No</th>
                <th>Full Name</th>
                <th>Birthday</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th width="280px">Action</th>
            </tr>
            @php
                $i = 0;
            @endphp
            @foreach($users as $user)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$user->full_name}}</td>
                    <td>{{$user->birthday}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->address}}</td>
                    <td>
                        <from action="/users.destroy, $user->id" method="POST"></from>
                        <a class="btn btn-info" href="/users.show,$user->id">Show</a>
                        <a class="btn btn-primary" href="/users.edit,$user->id">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>

                    </td>
                </tr>
            @endforeach
        </table>
        {!! $users->links() !!}
    </div>
    <div class="card-body pd-0">
        {{$users->$user(['search '=>request()->search])->link('')}}
    </div>
@endsection
