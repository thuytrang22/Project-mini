@extends('users.view')
@section('content')
    <div class="row">
        <div class="col-lg-11">
            <h2>Show User</h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-primary" href="{{route('users.index')}}">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="from-group">
                <strong>Full Name:</strong>
                <label>
                    {{$user->full_name}}
                </label>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="from-group">
                <strong>Birthday:</strong>
                <label>
                    {{$user->birthday}}
                </label>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="from-group">
                <strong>Email:</strong>
                <label>
                    {{$user->email}}
                </label>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="from-group">
                <strong>Phone:</strong>
                <label>
                    {{$user->phone}}
                </label>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="from-group">
                Address:
                <label>
                    {{$user->address}}
                </label>
            </div>
        </div>
    </div>
@endsection
