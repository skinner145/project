<?php
use App\Notifications\FixtureCreateFailed;
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


Route::get('/', 'FixtureController@index');

Route::resource('fixtures', 'FixturesController');

Auth::routes();

Route::get('/', 'SessionsController@create');


Route::get('/admin/home', 'Admin\HomeController@index')->name('admin.home');
Route::get('/user/home', 'User\HomeController@index')->name('user.home');


Route::resource('/admin/referees', 'Admin\RefereeController', array("as"=>"admin"));
Route::get('/referees', 'RefereeController@index')->name('referees.index');
Route::get('/referees/{id}', 'RefereeController@show')->name('referees.show');


Route::get('admin/fixtures/create', 'Admin\FixtureController@create');
Route::post('admin/fixtures/create', 'Admin\FixtureController@store')->name('fixture.store');
Route::resource('/admin/fixtures', 'Admin\FixtureController', array("as"=>"admin"));
Route::get('/admin/fixtures/{id}', 'Admin\FixtureController@show')->name('admin.fixtures.show');
Route::get('/admin/fixtures/pastfixtures', 'Admin\FixtureController@pastFixtures');

Route::get('/fixtures', 'User\FixtureController@index')->name('fixtures.index');
Route::get('/fixtures/{id}', 'User\FixtureController@show')->name('fixtures.show');
Route::get('/pastfixtures', 'FixturesController@pastFixtures');

Route::post('/fixtures/{fixture}/reports', 'FixtureReportsController@store');

Route::get('/home', 'FixtureController@index')->name('home');
//Route::get('/register', 'RegistrationController@create');
//Route::post('/register', 'RegistrationController@store');


//Route::get('/login', 'SessionsController@create');
//Route::post('/login', 'SessionsController@store');
//Route::get('/logout', 'SessionsController@destroy');
