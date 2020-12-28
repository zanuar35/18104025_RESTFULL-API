<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('jadwal','apicontroller@get_all_jadwal');
Route::post('jadwal/tambah_jadwal','apicontroller@insert_data');
Route::delete('jadwal/delete/{kode_bus}','apicontroller@delete_data');
Route::put('/jadwal/update/{kode_bus}','apicontroller@update_data');