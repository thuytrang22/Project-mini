@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="card-header">
                Detail
            </div>
            <div class="card-body">
                <p>ID :{{ $user->id }}</p>
                <p>Fullname : <strong>{{$user->full_name}}</strong></p>
                <p>Birthday : {{$user->birthday}} </p>
                <p>Email : {{$user->email}}</p>
                <p>Phone : {{$user->phone}}</p>
                <p>Address : {{$user->address}}</p>{{--
                <p>Created :<small class="text-muted">{{$user->create_at->format('d/m/Y H:i:s')}}</small></p>
                <p>Last Update :<small class="text-muted">{{$user->updated_at->format('d/m/Y H:i:s')}}</small></p>--}}
            </div>
        </div>
    </div>
</div>
