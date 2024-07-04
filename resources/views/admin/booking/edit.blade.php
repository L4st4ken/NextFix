@extends('admin.layout.app')
@section('title', 'Edit Booking')
@section('content')
<div class="row">
    <div class="col-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Booking Form</h6>
            </div>
            
            <div class="card-body">
                <form id="addUserForm" method="POST" action="{{ route('booking.update', $booking->id) }}">
                    @csrf
                    <div class="form-group row">
                      <label for="userID" class="col-sm-2 col-form-label">User ID</label>
                      <div class="col-sm-10">
                          <input type="text"  name="user_id" class="form-control" id="userID" value="{{ $booking->user_id }}">
                      </div>
                  </div>
                    <div class="form-group row">
                      <label for="movieID" class="col-sm-2 col-form-label">Movie ID</label>
                      <div class="col-sm-10">
                          <input type="text"  name="movie_id" class="form-control" id="movieID" value="{{ $booking->movie_id }}">
                      </div>
                  </div>
                    
                    <div class="form-group row">
                        <label for="inputQty" class="col-sm-2 col-form-label">Quantity</label>
                        <div class="col-sm-10">
                            <input type="number" name="quantity" class="form-control" id="inputQty" value="{{$booking->quantity}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="price" class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <input type="number" readonly name="price" class="form-control" id="price" value="{{$booking->price}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="booking_date" class="col-sm-2 col-form-label">Date</label>
                        <div class="col-sm-10">
                            <input type="datetime-local" name="booking_date" class="form-control datepicker" id="booking_date" value="{{$booking->booking_date}}" min="2024-01-01" max="2044-01-01">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning btn-sm"><i class="fas fa-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('inputQty').addEventListener('input', function() {
        var qty = document.getElementById('inputQty').value;
        var price = (qty * 35).toFixed(3);
        document.getElementById('price').value = price;
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                            window.location.href = "{{ route('booking') }}";
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire(
                        'Error!',
                        'There was a problem updating the booking table.',
                        'error'
                    );
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>
@endsection