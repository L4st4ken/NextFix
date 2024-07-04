@extends('admin.layout.app')
@section('title', 'Movies')
@section('content')
<h1 class="h3 mb-2 text-gray-800">Movie Tables</h1>

<div class="card shadow mb-4">
<div class="card-header py-3">
    <a class="btn btn-primary" href="{{route('movie.add')}}"><i class="fa fa-plus"></i> Add Movie</a>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Genre</th>
                    <th>Release Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1?>
                @foreach ($movies as $movie)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{ $movie->title }}</td>
                        <td>{{ $movie->description }}</td>
                        <td>{{ $movie->genre }}</td>
                        <td>{{ $movie->release_date }}</td>
                        <td>
                            <a href="{{route('movie.edit', $movie->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                            <a href="{{route('movie.delete', $movie->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection