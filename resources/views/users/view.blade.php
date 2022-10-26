@extends('users.view')
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>List user</h2>
                </div>
                <from action="{{route('users.create')}}" method="Post"></from>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{route('users.create')}}">Create user</a>
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
                        <from action="{{route('users.destroy', $user->id)}}" method="POST"></from>
                        <a class="btn btn-info" href="{{route('users.show',$user->id)}}">Show</a>
                        <a class="btn btn-primary" href="{{route('users.edit',$user->id)}}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>

                    </td>
                </tr>
            @endforeach
        </table>
        {!! $users->links() !!}
    </div>
@endsection
