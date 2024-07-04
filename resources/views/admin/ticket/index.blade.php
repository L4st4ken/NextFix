@extends('admin.layout.app')
@section('title', 'Tickets')
@section('content')
<h1 class="h3 mb-2 text-gray-800">Ticket Tables</h1>

<div class="card shadow mb-4">
<div class="card-header py-3">
    <a class="btn btn-primary" href="{{route('ticket.add')}}"><i class="fa fa-plus"></i> Add Ticket</a>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Booking ID</th>
                    <th>Seat Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1?>
                @foreach ($ticket as $ticket)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{ $ticket->booking_id }}</td>
                        <td>{{ $ticket->seat_number }}</td>
                        <td>
                            <a href="{{route('ticket.edit', $ticket->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                            <a href="{{route('ticket.delete', $ticket->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection