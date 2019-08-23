<?php

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

Route::get('/','Projects@index');
/*Route::get('/',function (){
    dd($this->app);
});*/
Auth::routes();

/*Route::get('/home', 'HomeController@index')->name('home');
Route::post('projects/store','Projects@store')->name('projects.store');
Route::delete('projects/remove/{projects}','Projects@remove')->name('projects.remove');
Route::patch('projects/update/{projects}','Projects@update')->name('projects.update');*/
Route::resource('projects','Projects');
Route::resource('tasks','Tasks');
Route::resource('tasks.steps','Steps');
Route::post('task/{id}/check','Tasks@check')->name('tasks.check');