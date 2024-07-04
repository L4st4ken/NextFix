@extends('admin.layout.app')
@section('title', 'Update User')
@section('content')
<h1 class="h3 mb-2 text-gray-800">Edit User</h1>

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
                <h6 class="m-0 font-weight-bold text-primary">Edit User Form</h6>
            </div>
            
            <div class="card-body">
                <form id="editUserForm" action="{{route('user.update', $user->id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" placeholder="" class="form-control" value="{{$user->name}}">
                        @error('name')
                            {{$message}}                                
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" value={{$user->email}}>
                        @error('email')
                            {{$message}}                                
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="password" class="form-control" value={{$user->password}}>
                        @error('password')
                            {{$message}}                                
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Age</label>
                        <input type="text" name="age" class="form-control"value={{$user->age}}>
                        @error('age')
                            {{$message}}                                
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" value="{{$user->address}}">
                        @error('address')
                            {{$message}}                                
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" name="phone_number" class="form-control" value="{{$user->phone_number}}">
                        @error('no_telp')
                            {{$message}}                                
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Country</label>
                        <input type="text" name="country" class="form-control" value="{{$user->country}}">
                        @error('country')
                            {{$message}}                                
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Save</button>
    
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#editUserForm').on('submit', function(event) {
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
                        'There was a problem updating the user.',
                        'error'
                    );
                    console.log('Error status: ' + xhr.status);
                    console.log('Error response text: ' + xhr.responseText);
                }
            });
        });
    });
</script>
@endsection