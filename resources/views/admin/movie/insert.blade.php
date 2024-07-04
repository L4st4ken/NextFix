@extends('admin.layout.app')
@section('title', 'Insert Movies')
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
                <form id="addUserForm" action="{{route('movie.add.insert')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control">
                        @error('title')
                            {{$message}}                                
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control">
                        @error('description')
                            {{$message}}                                
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Genre</label>
                        <input type="text" name="genre" class="form-control" >
                        @error('genre')
                            {{$message}}                                
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Release Date</label>
                        <input type="date" name="release_date" class="form-control">
                        @error('release_date')
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
                            window.location.href = "{{ route('movie') }}";
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