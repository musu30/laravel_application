<?php

use App\Models\Permission;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');










Auth::routes();
Route::get('/', 'HomeController@index');

Route::get('/register', function() {
    return redirect('/login');
});
Route::get('/password/reset', function() {
    return redirect('/login');
});



Route::get('customerlogin',  'UserController@login')
        ->name('customerlogin');




Route::post('/user/register', 'UserController@register');

Route::get('user/logout',  'UserController@logout');
Route::get('user/profile',  'ProfileController@index');

Route::post('user/profile/edit',  'ProfileController@ProfileEdit');

Route::post('/user/login', 'UserController@customerlogin');



Route::get('user/change-password',  'ProfileController@changePasswordForm');
Route::post('user/change_password',  'ProfileController@changePassword');



