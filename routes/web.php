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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
Route::get('/admin/login', 'Auth\AdminLoginController@index')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

Route::get('/professor', 'ProfessorController@index')->name('professor.dashboard');
Route::post('/professor/login', 'Auth\ProfessorLoginController@login')->name('professor.login.submit');
Route::get('/professor/login', 'Auth\ProfessorLoginController@showLoginForm')->name('professor.login');
Route::get('/professor/register', 'Auth\ProfessorRegisterController@showProfessorRegisterForm')->name('professor.register');
Route::post('/professor/register', 'Auth\ProfessorRegisterController@register');
Route::post('/professor/register/logout', 'Auth\ProfessorLoginController@logout')->name('professor.logout');

/*// Password Reset Routes...
Route::get('/professor/password/reset', 'Auth\ForgotPasswordController@ProfessorShowLinkRequestForm')->name('professor.password.email');;
Route::post('/professor/password/email', 'Auth\ForgotPasswordController@ProfessorSendResetLinkEmail')->name('professor.register');;
Route::get('/professor/password/reset/{token}', 'Auth\ResetPasswordController@ProfessorShowResetForm')->name('professor.register');;
Route::post('/professor/password/reset', 'Auth\ResetPasswordController@ProfessorReset')->name('professor.register');;*/