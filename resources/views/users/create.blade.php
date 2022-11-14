@extends('layouts.main')
@section('content')
    <form action="{{ route('users.create')  }}" method="POST">
        <div class="pull-right">
            <a class="btn btn-primary" href={{ route('users.index')  }}>Back</a>
        </div>
    </form>
    <div class="row">
        <div class="col-md-6 col-lg-4 ">
            <form action="{{route('users.store')}}" method="post" class="card">
                <div class="card-header">Create New User
                </div>
                <div class="card-body">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Full Name: <span class="text-danger">*</span> </label>
                        <input type="text" name="full_name" value="{{old('full_name')}}"
                               class="form-control" @error('full_name') @enderror>
                        @error('full_name')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Birthday:</label>
                        <input type="date" name="birthday" value="{{old('birthday')}}"
                               class="form-control" @error('birthday') @enderror>
                        @error('birthday')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" name="email" value="{{old('email')}}"
                               class="form-control" @error('email')  @enderror>
                        @error('email')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Phone:</label>
                        <input type="text" name="phone" value="{{old('phone')}}"
                               class="form-control" @error('phone') @enderror>
                        @error('phone')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Address:</label>
                        <input type="text" name="address" value="{{old('address')}}"
                               class="form-control" @error('address')  @enderror>
                        @error('address')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-primary" type="submit">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
