@extends('users.view')
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Add User</h2>
                </div>
                <form action="{{ route('users.create')  }}" method="POST">
                    <div class="pull-right">
                        <a class="btn btn-primary" href={{ route('users.index')  }}>Back</a>
                    </div>
                </form>
            </div>
        </div>
        @if(session('status'))
            <div class="'alert alert-success mb-1 mt-1">
                {{session('status')}}
            </div>
        @endif
        <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="from-group">
                        <strong>Full Name:</strong>
                        <label>
                            <input type="text" name="full_name" class="from-control" placeholder="User Name" >
                        </label>
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="from-group">
                        <strong>Birthday:</strong>
                        <label>
                            <input type="date" name="birthday" class="from-control" placeholder="Date Of Birth">
                        </label>
                        @error('birthday')
                        <div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="from-group">
                        <strong>Email:</strong>
                        <label>
                            <input type="email" name="email" class="from-control" placeholder="Email">
                        </label>
                        @error('email')
                        <div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="from-group">
                        <strong>Phone:</strong>
                        <label>
                            <input type="number" name="phone" class="from-control" placeholder="Phone">
                        </label>
                        @error('phone')
                        <div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="from-group">
                        <strong>Address</strong>
                        <label>
                            <input type="text" name="address" class="from-control" placeholder="Address">
                        </label>
                        @error('address')
                        <div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Create User</button>
            </div>
        </form>
    </div>
