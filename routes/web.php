<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingAdminController;
use App\Http\Controllers\bookingstaffController;
use App\Http\Controllers\MovieAdminController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\moviestaffController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TicketAdminController;
use App\Http\Controllers\ticketstaffController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/dashboard', [AdminController::class, 'show'])->middleware(['auth', 'admin'])->name('admin.dashboard');
Route::get('/staff/dashboard', [StaffController::class, 'show']) ->middleware(['auth', 'staff'])-> name('staff.dashboard'); 
Route::controller(UsersController::class)->prefix('admin/users')->group(function(){
    Route::get('/', 'index')->name('user');
    Route::get('insert', 'add')->name('user.add');
    Route::post('insert', 'insert')->name('user.add.insert');
    Route::get('edit/{id}', 'show')->name('user.edit');
    Route::post('edit/{id}', 'update')->name('user.update');
    Route::get('delete/{id}', 'delete')->name('user.delete');
    Route::delete('delete/{id}', 'destroy')->name('user.destroy');
});
Route::controller(BookingAdminController::class)->prefix('admin/bookings')->group(function(){
    Route::get('/', 'index')->name('booking');
    Route::get('insert', 'add')->name('booking.add');
    Route::post('insert', 'insert')->name('booking.add.insert');
    Route::get('edit/{id}', 'show')->name('booking.edit');
    Route::post('edit/{id}','update')->name('booking.update');
    Route::get('delete/{id}', 'delete')->name('booking.delete');
    Route::delete('delete/{id}','destroy')->name('booking.destroy');

});
Route::controller(MovieAdminController::class)->prefix('admin/movies')->group(function(){
    Route::get('/', 'index')->name('movie');
    Route::get('insert', 'add')->name('movie.add');
    Route::post('insert', 'insert')->name('movie.add.insert');
    Route::get('/edit/{id}', 'edit')->name('movie.edit');
    Route::post('/edit/{id}', 'update')->name('movie.update');
    Route::get('/delete/{id}','delete')->name('movie.delete');
    Route::delete('delete/{id}', 'destroy')->name('movie.destroy');
});
Route::controller(TicketAdminController::class)->prefix('admin/tickets')->group(function(){
    route::get('/', 'index')->name('ticket');
    Route::get('insert', 'add')->name('ticket.add');
    Route::post('insert', 'insert')->name('ticket.add.insert');
    Route::get('/edit/{id}', 'edit')->name('ticket.edit');
    Route::post('/edit/{id}', 'update')->name('ticket.update');
    Route::get('/delete/{id}','delete')->name('ticket.delete');
    Route::delete('delete/{id}', 'destroy')->name('ticket.destroy');
});
//Staff
Route::controller(moviestaffController::class)->prefix('staff/movies')->group(function(){
    Route::get('/', 'index')->name('staff.movie');
    Route::get('insert', 'add')->name('staff.movie.add');
    Route::post('insert', 'insert')->name('staff.movie.insert');
    Route::get('/edit/{id}', 'edit')->name('staff.movie.edit');
    Route::post('/edit/{id}', 'update')->name('staff.movie.update');
    Route::get('/delete/{id}','delete')->name('staff.movie.delete');
    Route::delete('delete/{id}', 'drop')->name('staff.movie.drop');

});
Route::controller(ticketstaffController::class)->prefix('staff/tickets')->group(function(){
    Route::get('/', 'index')->name('staff.ticket');
    Route::get('insert', 'add')->name('staff.ticket.add');
    Route::post('insert', 'insert')->name('staff.ticket.insert');
    Route::get('/edit/{id}', 'edit')->name('staff.ticket.edit');
    Route::post('/edit/{id}', 'update')->name('staff.ticket.update');
    Route::get('/delete/{id}','delete')->name('staff.ticket.delete');
    Route::delete('delete/{id}', 'drop')->name('staff.ticket.drop');
});
Route::controller(bookingstaffController::class)->prefix('staff/bookings')->group(function(){
    route::get('/', 'index')->name('staff.booking');
});

Route::controller(MoviesController::class)->prefix('dashboard/movies')->group(function(){
    Route::get('/', 'index')->name('movies.index');
    Route::get('insert/{id}', 'insert')->name('add.movie');
    Route::post('insert/{id}', 'add')->name('insert.movie');
    
});
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
}); 

require __DIR__.'/auth.php';
