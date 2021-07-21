<?php

use Illuminate\Http\Request;

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
Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');

 
Route::get('/siswa', 'SiswaController@tampil')->middleware('jwt.verify');
Route::get('/siswa/{siswa}', 'SiswaController@show')->middleware('jwt.verify');
Route::post('/siswa', 'SiswaController@tambah')->middleware('jwt.verify');
Route::patch('/siswa/{siswa}', 'SiswaController@ubah')->middleware('jwt.verify');
Route::delete('/siswa/{siswa}', 'SiswaController@hapus')->middleware('jwt.verify');

Route::get('/mapel', 'MataPelajaranController@tampil')->middleware('jwt.verify');
Route::get('/mapel/{mapel}', 'SiswaController@show')->middleware('jwt.verify');
Route::post('/mapel', 'MataPelajaranController@tambah')->middleware('jwt.verify');
Route::patch('/mapel/{mapel}', 'MataPelajaranController@ubah')->middleware('jwt.verify');
Route::delete('/mapel/{mapel}', 'MataPelajaranController@hapus')->middleware('jwt.verify');






Route::get('user', 'UserController@getAuthenticatedUser')->middleware('jwt.verify');
