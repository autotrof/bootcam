<?php

use App\Http\Controllers\ContohController;
use App\Http\Controllers\ContohControllerResource;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contoh', [ContohController::class, 'index']);
Route::post('/contoh', [ContohController::class, 'store']);
Route::put('/contoh', [ContohController::class, 'update']);
Route::delete('/contoh', [ContohController::class, 'delete']);

Route::resource('contoh-resource', ContohControllerResource::class);
