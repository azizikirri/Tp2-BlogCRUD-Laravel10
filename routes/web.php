<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::resource('students', StudentController::class);

/*
Route::get('/students', 'StudentController@index')->name('students.index');
Route::get('/students/create', 'StudentController@create')->name('students.create');
Route::post('/students', 'StudentController@store')->name('students.store');
Route::get('/students/{student}', 'StudentController@show')->name('students.show');
Route::get('/students/{student}/edit', 'StudentController@edit')->name('students.edit');
Route::put('/students/{student}', 'StudentController@update')->name('students.update');
Route::delete('/students/{student}', 'StudentController@destroy')->name('students.destroy');

*/
