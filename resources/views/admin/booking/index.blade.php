@extends('admin.layout.app')
@section('title', 'Bookings')
@section('content')
<h1 class="h3 mb-2 text-gray-800">Booking Tables</h1>

<div class="card shadow mb-4">
<div class="card-header py-3">
    <a href="{{route('booking.add')}}" class= "btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add New User</a>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Movie ID</th>
                    <th>Quantity</th>
                    <th>Booking Date</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1?>
                @foreach ($booking as $row)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$row->id}}</td>
                        <td>{{$row->user_id}}</td>
                        <td>{{$row->movie_id}}</td>
                        <td>{{$row->quantity}}</td>
                        <td>{{$row->booking_date}}</td>
                        <td>{{$row->price}}</td>
                        <td>
                            <a href="{{route('booking.edit', $row->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                            <a href="{{route('booking.delete', $row->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection