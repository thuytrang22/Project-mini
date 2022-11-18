@extends('layouts.main')
@section('content')
    <form action="{{ route('users.create')  }}" method="POST">
        <div class="pull-right">
            <a class="btn btn-primary" href={{ route('users.index')  }}>Back</a>
        </div>
    </form>
    <div class="row">
        <div class="col-md-6 col-lg-4">
            <div class="card">
                <div class="card-header">
                    Detail User
                </div>
                <div class="card-body">
                    <p>ID :{{ $user->id }}</p>
                    <p>Fullname : <strong>{{$user->full_name}}</strong></p>
                    <p>Birthday : {{$user->birthday}} </p>
                    <p>Email : {{$user->email}}</p>
                    <p>Phone : {{$user->phone}}</p>
                    <p>Address : {{$user->address}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
