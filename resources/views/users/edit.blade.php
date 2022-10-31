@extends('users.index')
<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-2">
                <h2>Edit User</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('users.index')}}" enctype="multipart/form-data">Back</a>
            </div>
        </div>
    </div>
    @if(session('status'))
        <div class="'alert alert-success mb-1 mt-1">
            {{session('status')}}
        </div>
    @endif
    @php
        $i = 0;
    @endphp
    <from action="{{route('users.edit',$i)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="from-group">
                    <strong>Full Name:</strong>
                    <input type="text" name="name" class="from-control" value="{{$user->full_name}}" placeholder="User Name">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="from-group">
                    <strong>Date of birth:</strong>
                    <input type="date" name="name" class="from-control" value="{{$user->birthday}}"placeholder="Date Of Birth">
                    @error('birthday')
                    <div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="from-group">
                    <strong>Email:</strong>
                    <input type="email" name="name" class="from-control" value="{{$user->email}}"placeholder="Email">
                    @error('email')
                    <div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="from-group">
                    <strong>Phone:</strong>
                    <input type="number" name="name" class="from-control" value="{{$user->phone}}"placeholder="Phone">
                    @error('phone')
                    <div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="from-group">
                    <strong>Address</strong>
                    <input type="text" name="name" class="from-control" value="{{$user->address}}"placeholder="Address">
                    @error('address')
                    <div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary ml-3">Submit</button>
        </div>
    </from>
</div>
