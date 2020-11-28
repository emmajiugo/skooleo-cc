<?php

use Illuminate\Support\Facades\Auth;
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
    return redirect(route('login'));
});

Auth::routes();

Route::get('redirect/{driver}', 'Auth\LoginController@redirectToProvider')
    ->name('login.provider')
    ->where('driver', implode('|', config('auth.socialite.drivers')));

Route::get('{driver}/callback', 'Auth\LoginController@handleProviderCallback')
    ->name('login.callback')
    ->where('driver', implode('|', config('auth.socialite.drivers')));

Route::get('/home', 'HomeController@index')->name('home');

// Schools
Route::get('/schools', 'SchoolController@index')->name('schools');
Route::get('/schools/{id}/view', 'SchoolController@view')->name('schools.view');
Route::get('/schools/{id}/withdraws', 'SchoolController@withdraws')->name('schools.withdraws');



// Add allowed users
Route::get('/add-user', 'AddUserController@index')->name('adduser');
Route::post('/add-user', 'AddUserController@add')->name('adduser.post');
Route::delete('/add-user/{id}', 'AddUserController@delete')->name('adduser.delete');

// Audit Log
Route::get('/audit-logs', 'AuditLogController@index')->name('audit');
Route::post('/audit-logs', 'AuditLogController@search')->name('audit.search');

// Roles and  Permission
Route::get('/set-roles', 'RolesController@index')->name('roles');
Route::post('/set-roles', 'RolesController@create')->name('set.roles');
Route::delete('/set-roles/{id}', 'RolesController@delete')->name('delete.roles');
Route::get('/set-permissions', 'PermissionsController@index')->name('permissions');
Route::post('/set-permissions', 'PermissionsController@create')->name('set.permissions');
Route::get('/assign-permissions-to-roles', 'PermissionsRolesController@index')->name('roles.permissions');
Route::post('/assign-permissions-to-roles', 'PermissionsRolesController@assign')->name('assign.roles.permissions');

