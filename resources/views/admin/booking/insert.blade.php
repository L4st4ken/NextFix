@extends('admin.layout.app')
@section('title', 'Insert Bookings')
@section('content')
<h1 class="h3 mb-2 text-gray-800">Add Booking</h1>

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
                <h6 class="m-0 font-weight-bold text-primary">Add Booking Form</h6>
            </div>
            
            <div class="card-body">
                <form id="addUserForm" action="{{route('booking.add.insert')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>User ID</label>
                        <input type="text" name="user_id" class="form-control">
                        @error('user_id')
                            {{$message}}                                
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Movie ID</label>
                        <input type="text" name="movie_id" class="form-control">
                        @error('movie_id')
                            {{$message}}                                
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" name="quantity" class="form-control" id="inputQty">
                        @error('quantity')
                            {{$message}}                                
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Booking Date</label>
                        <input type="date" name="booking_date" class="form-control" min="2024-01-01" max="2044-01-01">
                        @error('booking_date')
                            {{$message}}                                
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" name="price" class="form-control" id="price" readonly>
                        @error('price')
                            {{$message}}                                
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm" onclick="contoh()"><i class="fas fa-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('inputQty').addEventListener('input', function(){
        var qty = document.getElementById('inputQty').value;
        var price = (qty * 35).toFixed(3);
        document.getElementById('price').value = price;
    });
</script>
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
                        text: 'Data successfully added',
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
                    'There was a problem deleting the user.',
                    'error'
                );
                console.log(xhr.responseText);
            }
            });
        });
    });
</script>
    
@endsection