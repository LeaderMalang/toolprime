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
use App\Http\Controllers\Admin\Auth\AuthenticationController;

Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    /**
     * Home Routes
     */
    // Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('/', function () {
        return view('admin_panel.index');
    })->name('home-page');

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', [AuthenticationController::class,'showRegister'])->name('register.show');
        Route::post('/register', [AuthenticationController::class,'register'])->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', [AuthenticationController::class,'showLogin'])->name('login.show');
        Route::post('/login', [AuthenticationController::class,'login'])->name('login.perform');

    });

    Route::group(['middleware' => ['auth', 'permission']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

        /**
         * User Routes
         */
        Route::group(['prefix' => 'users'], function() {
            Route::get('/', 'UsersController@index')->name('users.index');
            Route::get('/create', 'UsersController@create')->name('users.create');
            Route::post('/create', 'UsersController@store')->name('users.store');
            Route::get('/{user}/show', 'UsersController@show')->name('users.show');
            Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
            Route::patch('/{user}/update', 'UsersController@update')->name('users.update');
            Route::delete('/{user}/delete', 'UsersController@destroy')->name('users.destroy');
        });

        /**
         * Packages Routes
         */
        // Route::group(['prefix' => 'packages'], function() {
        //     Route::get('/', 'PackagesController@index')->name('packages.index');
        //     Route::get('/create', 'PackagesController@create')->name('packages.create');
        //     Route::post('/create', 'PackagesController@store')->name('packages.store');
        //     Route::get('/{package}/show', 'PackagesController@show')->name('packages.show');
        //     Route::get('/{package}/edit', 'PackagesController@edit')->name('package.edit');
        //     Route::patch('/{package}/update', 'PackagesController@update')->name('packages.update');
        //     Route::delete('/{package}/delete', 'PackagesController@destroy')->name('package.destroy');
        // });

        Route::resource('roles', \Admin\Role\RolesController::class);
        Route::resource('permissions', \Admin\Role\PermissionsController::class);
    });
});
