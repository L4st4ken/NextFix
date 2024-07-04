@extends('admin.layout.app')
@section('title', 'NextFix Users')
@section('content')
    <h1 class="h3 mb-2 text-gray-800">User Tables</h1>

    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{route('user.add')}}" class= "btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add New User</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>User Type</th>
                        <th>Age</th>
                        <th>Address</th>
                        <th>Country</th>
                        <th>Phone Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1?>
                    @foreach ($user_fake as $row)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$row->id}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->usertype}}</td>
                            <td>{{$row->age}}</td>
                            <td>{{$row->address}}</td>
                            <td>{{$row->country}}</td>
                            <td>{{$row->phone_number}}</td>
                            <td>
                                <a href="{{route('user.edit', $row->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                <a href="{{route('user.delete', $row->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
                    