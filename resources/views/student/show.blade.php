@extends('layouts.main')
@section('content')
    <form action="{{ route('student.create')  }}" method="POST">
        <div class="pull-right">
            <a class="btn btn-primary" href={{ route('student.index')  }}>Back</a>
        </div>
    </form>
    <div class="row">
        <div class="col-md-6 col-lg-4">
            <div class="card">
                <div class="card-header">
                    Detail User
                </div>
                <div class="card-body">
                    <p>ID :{{ $student->id }}</p>
                    <p>Fullname : <strong>{{$student->name}}</strong></p>
                    <p>Birthday : {{$student->birthday}} </p>
                    <p>Email : {{$student->email}}</p>
                    <p>Phone : {{$student->phone}}</p>
                    <p>Address : {{$student->address}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
