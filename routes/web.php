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
    return redirect('dashboard');
});

Route::get('/login', function () {
    return view('user.login');
});
Route::post('/login', 'UserController@userLogin');
Route::get('/register', function () {
    return view('user.register');
});
Route::post('/register', 'UserController@userRegister');

Route::group(['middleware' => ['web','user.logged.in']], function () {
    Route::get('/logout', 'UserController@userLogout');
    Route::get('/dashboard', 'UserController@showrDashboardPage');

    Route::get('/license', 'UserController@showLicensePage');
    Route::post('/license', 'UserController@updateLicense');

    Route::prefix('cars')->group(function () {
        Route::get('/', 'CarsController@showUserCarsPage');
        Route::get('/order/{carId}', 'UserController@showOrderCarPage');
        Route::post('/order/{carId}', 'UserController@orderCar');
    });

    Route::get('/orders', 'UserController@showUserOrdersPage');
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

        Route::prefix('cars')->group(function () {
            Route::get('/', 'CarsController@showAdminCarsPage');
            Route::get('/new', 'CarsController@showCreateNewCarsPage');
            Route::post('/new', 'CarsController@createNewCar');
        });

        Route::prefix('makes')->group(function () {
            Route::get('/', 'CarsController@showAdminMakesPage');
            Route::get('/new', 'CarsController@showCreateNewMakesPage');
            Route::post('/new', 'CarsController@createNewMake');
        });
    });
});