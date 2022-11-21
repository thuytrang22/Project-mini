<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap Simple Data Table</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{url('assets')}}/js/customer_page.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{url('assets')}}/css/style.css">

</head>

<body>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h2>List of <b>Customers</b></h2>
                    </div>
                    <div class="col-sm-4">
                        <div class="search-box">
                            <form method="GET" action="{{route('customer.index')}}">
                                <i class="material-icons">&#xE8B6;</i>
                                <input type="text" id="" name="keyword" value="{{request()->keyword ?? ''}}"
                                       class="form-control" placeholder="Search&hellip;">
                                <button type="submit" class="btn btn-primary mt-1">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover table-bordered " id="myTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name <i class="fa fa-sort"></i></th>
                    <th>Email</th>
                    <th>Phone<i class="fa fa-sort"></i></th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @if($customers!=null)
                    @foreach($customers as $customer)
                        <tr>
                            <td>{{$customer->id}}</td>
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->email}}</td>
                            <td>{{$customer->phone_number}}</td>
                            <td>{{$customer->created_at}}</td>
                            <td>
                                <a href="#" class="view" id="view_icon" title="View" data-toggle="tooltip"><i
                                        class="material-icons">&#xE417;</i></a>
                                <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i
                                        class="material-icons">&#xE254;</i></a>
                                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                                        class="material-icons">&#xE872;</i></a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td>No Data</td>
                    </tr>
                @endif
                </tbody>
            </table>
            <div class="clearfix">
                <div class="hint-text">Showing <b>{{$customers->count()}}</b> out of <b></b> entries</div>
                {!! $customers->links() !!}
            </div>
        </div>
    </div>
</div>
</body>

</html>
