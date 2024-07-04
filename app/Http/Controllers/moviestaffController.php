<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class moviestaffController extends Controller
{
    public function index(){
        $movies = Movies::all();
        return view('/staff/movie/index', ['movies'=>$movies]);
    }
    public function add(){
        return view('/staff/movie/insert');
    }
    public function insert(Request $request){
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'genre' => ['required', 'string', 'max:255'],
            'release_date' => ['required', 'date'],
        ]);
        Movies::create([
            'title' => $request->title,
            'description' => $request->description,
            'genre' => $request->genre,
            'release_date' => $request->release_date,
        ]);
    }
    public function edit($id){
        $movieId = Movies::findorfail($id);
        return view('/staff/movie/edit', compact('movieId'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'genre' => ['required', 'string', 'max:255'],
            'release_date' => ['required', 'date'],
        ]);
        $movie = Movies::findorfail($id);
        
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'genre' => $request->genre,
            'release_date' => $request->release_date,
        ];
        $movie->update($data);
    }
    public function delete($id){
        $movie = Movies::findorfail($id);
        return view('/staff/movie/delete', compact('movie'));
    }
    public function drop($id){
        try{
            $movie = Movies::findorfail($id);
            $movie->delete();
            return response()->json(['message' => 'Movie deleted successfully.'], 200);
        }catch(\Exception $e){
            Log::error('Error deleting user: ' . $e->getMessage(), ['id' => $id]);
        }
    }
}
