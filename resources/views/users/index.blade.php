@extends('users.view')
@section('content')
    <div class="card mb-5">
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

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
