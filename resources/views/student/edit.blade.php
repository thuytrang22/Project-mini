@extends('layouts.main')
@section('content')
    <form action="{{ route('student.create')  }}" method="POST">
        <div class="pull-right">
            <a class="btn btn-primary" href={{ route('student.index')  }}>Back</a>
        </div>
    </form>
    <div class="row">
        <div class="col-md-6 col-lg-4 ">
            <form action="{{route('student.update',['student'=>$student->id])}}" method="post" class="card">
                <div class="card-header">
                    <i class="fas fa-circle-plus"></i> Edit User
                </div>
                <div class="card-body">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="" class="form-label">Full Name:</label>
                        <input type="text" name="name" value="{{old('name',$student->name)}}"
                               class="form-control" @error('name') @enderror>
                        @error('name')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Birthday:</label>
                        <input type="date" name="birthday" value="{{old('birthday'.$student->birthday)}}"
                               class="form-control" @error('birthday') @enderror>
                        @error('birthday')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="text" name="email" value="{{old('email',$student->email)}}"
                               class="form-control" @error('email')@enderror>
                        @error('email')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Phone:</label>
                        <input type="text" name="phone" value="{{old('phone',$student->phone)}}"
                               class="form-control" @error('phone') @enderror>
                        @error('phone')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Address:</label>
                        <input type="text" name="address" value="{{old('address',$student->address)}}"
                               class="form-control" @error('address') @enderror>
                        @error('address')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-primary" type="submit">

                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
