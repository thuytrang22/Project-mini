@extends('layouts.main')
@section('content')
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
