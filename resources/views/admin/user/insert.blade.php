@extends('admin.layout.app')
@section('title', 'Insert User')
@section('content')
    <h1 class="h3 mb-2 text-gray-800">Add User</h1>

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
                    <h6 class="m-0 font-weight-bold text-primary">Add User Form</h6>
                </div>
                
                <div class="card-body">
                    <form id="addUserForm" action="{{route('user.add.insert')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" placeholder="" class="form-control">
                            @error('name')
                                {{$message}}                                
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control">
                            @error('email')
                                {{$message}}                                
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control">
                            @error('password')
                                {{$message}}                                
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Age</label>
                            <input type="text" name="age" class="form-control">
                            @error('age')
                                {{$message}}                                
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control">
                            @error('address')
                                {{$message}}                                
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Country</label>
                            <input type="text" name="country" class="form-control">
                            @error('country')
                                {{$message}}                                
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" name="phone_number" class="form-control">
                            @error('no_telp')
                                {{$message}}                                
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm" onclick="contoh()"><i class="fas fa-save"></i> Save</button>
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
                            text: 'Data successfully added',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "{{ route('user') }}";
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