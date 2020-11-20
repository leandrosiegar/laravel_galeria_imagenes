<?php

use Illuminate\Support\Facades\Route;
use App\File;

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

Route::get('/', 'HomeController@index');

Auth::routes();


// Route::get('/home', 'admin\HomeController@index')->name('admin.home');

Route::group(['prefix' => 'admin', 'namespace' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index')->name('admin.home');
    Route::resource('/files', 'FileController')->names('admin.files');
});
/*
Route::get('/admin', 'admin\HomeController@index')->name('admin.home');
Route::resource('/admin/files', 'admin\FileController')->names('admin.files');
*/
