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
})->name('welcome');

Route::group(['middleware' => 'user'], function () {
    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/logout', 'Auth\LoginController@protectLogout')->name('protect.logout');


Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
    Route::get('/admin/login', 'Auth\AdminLoginController@index')->name('admin.login');
    Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
});

Route::group(['middleware' => 'professor'], function () {
    Route::get('/professor', 'ProfessorController@index')->name('professor.dashboard');
    Route::post('/professor/login', 'Auth\ProfessorLoginController@login')->name('professor.login.submit');
    Route::get('/professor/login', 'Auth\ProfessorLoginController@showLoginForm')->name('professor.login');
    Route::get('/professor/register', 'Auth\ProfessorRegisterController@showProfessorRegisterForm')->name('professor.register');
    Route::post('/professor/register', 'Auth\ProfessorRegisterController@register');
    Route::post('/professor/register/logout', 'Auth\ProfessorLoginController@logout')->name('professor.logout');

    Route::get('/professor/criacao', 'CriarSessaoController@index')->name('teladecriacao');
    Route::post('/professor/criacao', 'CriarSessaoController@store')->name('teladecriacao.submit');
    
    Route::get('/professor/password/reset', 'Auth\ForgotProfessorPasswordController@ShowLinkRequestForm')->name('professor.password.request');
    Route::post('/professor/password/email', 'Auth\ForgotProfessorPasswordController@SendResetLinkEmail')->name('professor.password.email');
    Route::get('/professor/password/reset/{token}', 'Auth\ResetProfessorPasswordController@ShowResetForm')->name('professor.password.reset');
    Route::post('/professor/password/reset', 'Auth\ResetProfessorPasswordController@Reset')->name('professor.password.update');

});



