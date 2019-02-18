<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Авторизация
Route::post('auth/register', 'AuthController@register');
Route::post('auth/login', 'AuthController@login');

Route::group(['middleware' => 'jwt.auth'], function() {
  Route::get('auth/user', 'AuthController@user');
  Route::post('auth/logout', 'AuthController@logout');

  Route::get('backups_all', 'BackupController@getBackups');
  Route::get('backup/{id}', 'BackupController@getBackup');
  Route::post('backup_save', 'BackupController@saveBackup');
  Route::delete('backup_delete/{id}', 'BackupController@deleteBackup');


  Route::post('backup_auto_save', 'BackupController@autoSaveBackup');
  Route::get('get_auto_backup', 'BackupController@getAutoBackup');


});
