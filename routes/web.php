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
Route::get('/school/{id}/activate', 'SchoolController@activate')->name('school.activate');
Route::get('/school/{id}/disable', 'SchoolController@disable')->name('school.disable');

// Invoices
Route::get('/invoices', 'InvoicesController@index')->name('invoices');

// Web settings
Route::get('/web-settings', 'WebSettingsController@index')->name('web.settings');
Route::post('/web-settings', 'WebSettingsController@post')->name('web.settings.post');

// Academic session
Route::get('/academic-session', 'AcademicSessionController@index')->name('academic.session');
Route::post('/academic-session', 'AcademicSessionController@post')->name('academic.session.post');

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

