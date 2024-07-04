<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookingAdminController extends Controller
{
    public function index(){
        return view('admin.booking.index', [
            'booking' => Bookings::latest()->get()
        ]);
    }
    public function add(){
        return view ('admin.booking.insert');
    }
    public function insert(Request $request){
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
    public function show($id){
        $booking = Bookings::findorfail($id);
        return view('admin.booking.edit', compact('booking'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'user_id' => ['required', 'integer'],
            'movie_id' => ['required', 'integer'],
            'quantity' => ['required', 'min:1'],
            'price' => ['required', 'numeric', 'min:0'],
            'booking_date' => ['required', 'date'],
        ]);
        $booking = Bookings::findOrfail($id);
        $data = [
            'user_id' => $request->user_id,
            'movie_id' => $request->movie_id,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'booking_date' => $request->booking_date,
        ];
        $booking->update($data);
    }
    public function delete($id){
        $booking = Bookings::findorfail($id);
        return view ('admin.booking.delete', compact('booking'));
    }
    public function destroy($id){
        try{
            $booking = Bookings::findOrFail($id);
            $booking->delete();
            return response()->json(['message' => 'User deleted successfully.'], 200);

        }catch(\Exception $e){
            Log::error('Error deleting user: ' . $e->getMessage(), ['user_id' => $id]);
        }
    }
}
