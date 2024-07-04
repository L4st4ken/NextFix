<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function show(){
        $usersCount = DB::table('users')->count('email');
        $priceMonth = DB::table('bookings')->whereBetween('booking_date', ['2024-06-01', '2024-06-30'])->sum('price');
        $priceAnnual = DB::table('bookings')->whereBetween('booking_date', ['2024-01-01', '2024-12-31'])->sum('price');
        $monthlyEarnings = DB::table('bookings')
        ->select(DB::raw('SUM(price) as total'), DB::raw('MONTH(booking_date) as month'))
        ->whereYear('booking_date', Carbon::now()->year)
        ->groupBy(DB::raw('MONTH(booking_date)'))
        ->pluck('total', 'month')
        ->toArray();

        return view('admin.dashboard',compact('priceMonth', 'priceAnnual', 'usersCount', 'monthlyEarnings'));
    }
}
