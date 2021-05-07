<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PositionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::redirect('/', 'home');
Route::get('admin/positions', [PositionController::class, 'index'])->middleware('auth');;
Route::resource('admin/positions', PositionController::class);
//Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::get('admin/employees', function() {
    return view('employee');
})->name('home')->middleware('auth');


