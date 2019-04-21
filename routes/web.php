<?php
use Illuminate\Support\Facades\Route;


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

Auth::routes();

Route::put('/dashboard/password/update', 'PasswordController@update');
Route::get('/dashboard/password','PasswordController@edit');

Route::resource('dashboard', 'DashboardController');

Route::get('/dashboard/act_done/{id}','DashboardController@act_done');
Route::get('/dashboard/act_cancel/{id}','DashboardController@act_cancel');


// Belajar Doang
Route::get('/', function () {
    return redirect('login');
});







