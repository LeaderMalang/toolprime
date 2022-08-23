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
use App\Http\Controllers\Admin\Role\RoleController;
use App\Http\Controllers\Admin\Permission\PermissionController;
use App\Http\Controllers\Admin\User\UsersController;


Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    /**
     * Home Routes
     */
    // Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('/', function () {
        return view('admin_panel.index');
    })->name('home-page');
    Route::get('/user/dashboard', function () {
        return view('user_panel.index');
    })->name('user-home-page');
    Route::get('/profile', function () {
        return view('admin_panel.profile.index');
    })->name('profile');


    Route::group(['prefix' => 'role'], function() {
        Route::get('/', [RoleController::class,'index'])->name('role.index');
        Route::get('/edit', [RoleController::class,'edit'])->name('role.edit');
        Route::get('/list', [RoleController::class,'list'])->name('role.list');

    });
    Route::group(['prefix' => 'permission'], function() {
        Route::get('/', [PermissionController::class,'index'])->name('permission.index');
        Route::get('/edit', [PermissionController::class,'edit'])->name('permission.edit');
        Route::get('/list', [PermissionController::class,'list'])->name('permission.list');

        
        
        
    });
    Route::group(['prefix' => 'users'], function() {
        Route::get('/', [UsersController::class,'index'])->name('user.index');
        Route::get('/edit', [UsersController::class,'edit'])->name('user.edit');
        Route::get('/list', [UsersController::class,'list'])->name('user.list');
    });




    });
    Route::get('/logout', [AuthenticationController::class,'home'])->name('logout');

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

        // Route::resource('roles', \Admin\Role\RolesController::class);
        // Route::resource('permissions', \Admin\Role\PermissionsController::class);
    });
});
