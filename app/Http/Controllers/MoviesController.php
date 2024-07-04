<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Models\Movies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class MoviesController extends Controller
{
    public function index(){
        $movies = DB::table('movies')->paginate(10);
        return view('index', ['movies' => $movies]);
    }
    public function insert($id){
        $mid = Movies::findorFail($id);
        $userId = Auth::id();
        return view('movie', compact('mid', 'userId'));
    }
    public function add(Request $request){
        
        $request->validate([
            'user_id' => ['required', 'integer'],
            'movie_id' => ['required', 'integer'],
            'quantity' => ['required', 'min:1'],
            'price' => ['required', 'numeric', 'min:0'],
            'booking_date' => ['required', 'date'],
        ]);
        Bookings::create([
            'user_id' => $request->user_id,
            'movie_id' => $request->movie_id,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'booking_date' => $request->booking_date,
        ]);

    }
}
