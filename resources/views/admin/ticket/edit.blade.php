@extends('admin.layout.app')
@section('title', 'Edit Tickets')
@section('content')
<h1 class="h3 mb-2 text-gray-800">Edit Ticket</h1>

@if (session('message'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{session('message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="row">
    <div class="col-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Ticket Form</h6>
            </div>
            
            <div class="card-body">
                <form id="addUserForm" action="{{ route('ticket.update', $ticketId->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Booking ID</label>
                        <input type="text" name="booking_id" class="form-control" value="{{$ticketId->booking_id}}">
                        @error('booking_id')
                            {{$message}}                                
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Seat Number</label>
                        <input type="text" name="seat_number" class="form-control" value="{{$ticketId->seat_number}}">
                        @error('seat_number')
                            {{$message}}                                
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-warning btn-sm" onclick="contoh()"><i class="fas fa-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#addUserForm').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        title: 'Success!',
                        text: 'Data successfully updated',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{ route('ticket') }}";
                        }
                    });
                },
                error: function(xhr) {
                Swal.fire(
                    'Error!',
                    'There was a problem updating the user.',
                    'error'
                );
                console.log(xhr.responseText);
            }
            });
        });
    });
</script>
    
@endsection