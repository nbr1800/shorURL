<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortUrlController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/hola', function (Request $request) {
    return 'Hola..';
});


Route::post('/shorten', [ShortUrlController::class, 'create']);
Route::get('/{shortCode}', [ShortUrlController::class, 'redirect']);
