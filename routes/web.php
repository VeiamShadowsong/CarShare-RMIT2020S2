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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect('admin/dashboard');
    });

    Route::get('/login', function () {
        return view('admin.login');
    });
    Route::post('/login', 'AdminController@adminLogin');

    Route::group(['middleware' => ['web','admin.logged.in']], function () {
        Route::get('/logout', 'AdminController@adminLogout');
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        });
    });
});