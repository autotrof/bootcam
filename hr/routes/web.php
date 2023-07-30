<?php

use App\Http\Controllers\JobPositionController;
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

Route::redirect('/', '/job-position');


Route::resource('/job-position', JobPositionController::class)->except('show');
