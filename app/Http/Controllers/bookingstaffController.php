<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use Illuminate\Http\Request;

class bookingstaffController extends Controller
{
    public function index(){
        $booking = Bookings::all();
        return view('/staff/booking/index', ['booking'=>$booking]);
    }
}
