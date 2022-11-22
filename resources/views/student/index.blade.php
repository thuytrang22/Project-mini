@extends('layouts.main')
@section('content')
    @if ( session('store'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Saved Successfully!</strong>User has been successfully saved
        </div>
    @endif
    @if ( session('update'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Update Successfully!</strong>User has been successfully update
        </div>
    @endif
    @if ( session('destroy'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Delete Successfully!</strong>User has been successfully delete
        </div>
    @endif
    <div class="card mb-5">
        <div class="card-body">
            <div class="row">
                <div class="col-auto">
                    <a href="{{route('student.create')}}" class="btn btn-primary">
                        <i class="fas fe-circle-plus"></i>Create New User
                    </a>
                </div>
                <form action="?" class="col-auto ms-auto">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control " value="{{request()->keywords}}"
                               placeholder="search name user ..."/>
                        <button type="submit" class="btn btn-secondary">Go!</button>
                    </div>
                </form>
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
                    <th>Image</th>
                    <th width="280px">Action</th>
                </tr>
                </thead>
                <tbody>
                @if(count($students) > 0)
                    @foreach($students as $student)
                        <tr>
                            <td>{{$student->id}}</td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->birthday}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->phone}}</td>
                            <td>{{$student->address}}</td>
                            <td>{{$student->image}}</td>
                            <td>
                                <form action="{{ route('student.destroy',$student->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{route('student.show',$student->id)}}">Show</a>
                                    <a class="btn btn-info" href="{{route('student.edit',$student->id)}}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-info">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center">No Data Found</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
        <div class="card-body pb-0">
{{--            {{$users->appends(['keywords'=>request()->keywords])->links('vendor.pagination.bootstrap-5')}}--}}
        </div>
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        var route = "{{ url('autocomplete-search') }}";
        $('#keywords').typeahead({
            source: function (query, process) {
                return $.get(route, {
                    query: query
                }, function (data) {
                    return process(data);
                });
            }
        });
    </script>
@endpush

