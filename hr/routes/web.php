<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\JobPositionController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', [JobPositionController::class, 'index']);
// Route::post('/', [JobPositionController::class, 'store']);
// Route::get('/create', [JobPositionController::class, 'create']);
// Route::get('/edit/{jobPosition}', [JobPositionController::class, 'edit']);
// Route::put('/edit/{jobPosition}', [JobPositionController::class, 'update']);
// Route::delete('/delete/{jobPosition}', [JobPositionController::class, 'destroy']);


Route::middleware('auth')->group(function() {
    Route::redirect('/', '/employee');
    Route::resource('/job-position', JobPositionController::class)->except('show');
    Route::resource('/employee', EmployeeController::class)->except('show');
    Route::resource('/attendance', AttendanceController::class)->except('show');
});

Route::middleware('guest')->group(function() {
    Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
    Route::post('/login', [AuthController::class, 'loginCheck'])->name('login.check');
});

Route::get('link', function() {
    Artisan::call('storage:link');
});

Route::post('x', function() {
    phpinfo();
});
