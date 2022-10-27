@extends('layouts.main')
@section('content')
    @if ( session('store')
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Saved Successfully!</strong>User has been successfully saved
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
                @foreach
                <tr>
                    <td>{{user->id}}</td>
                    <td>{{$user->full_name}}</td>
                    <td>{{$user->birthday}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->address}}</td>
                    <td>
                        <a href="{{route('users.show'),['user'=>$user->id]}}" class="btn btn-sm"><i class="fas fa-eye"></i> </a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection
