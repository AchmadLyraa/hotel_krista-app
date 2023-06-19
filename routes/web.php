<?php

use App\Http\Controllers\LoginAdminController;
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

// Route::get('/phpmyadmin', function () {
//     return redirect('/phpmyadmin');
// });

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('about', 'about')->name('about');

// Route::view('/login', 'auth.login')->name('login');

Route::group(
    [
        'namespace' => 'App\\Http\\Controllers',
    ],
    function () {
        Route::get('/login', 'LoginAdminController@formLogin')->name('login');
        Route::post('/login', 'LoginAdminController@login');

        Route::group(
            ['middleware' => 'auth:admin'],
            function () {
                Route::post('logout', 'LoginAdminController@logout')->name('admin.logout');
                // Route::post('users/edit?{id}');
                Route::group(['middleware' => ['can:role, "admin"']], function () {
                    Route::resource('admin/user', 'AdminController')->names([
                        'index' => 'userAdmin',
                        'create' => 'createAdmin',
                        'store' => 'storeAdmin',
                        'update' => 'updateAdmin',
                        'edit' => 'editAdmin',
                        'destroy' => 'destroyAdmin'
                    ]);
                });

                Route::view('admin/dashboard', 'dashboard')->name('dashboard');
                Route::get('admin/account', 'AdminController@account')->name('myAccount');
                Route::put('admin/account', 'AdminController@updateAccount');
            }
        );
    }
);
