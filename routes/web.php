<?php
// DB::listen(function ($query) {
//     var_dump($query->sql, $query->bindings);
// });

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
    return view('welcome');
});


Route::group(['middleware' => ['auth']], function () {
    Route::get('/tweets', 'TweetController@index')->name('home');
    Route::post('/tweets', 'TweetController@store');

    Route::post('/profiles/{user:name}/follow', 'FollowsController@store');
    Route::get(
        '/profiles/{user:name}/edit',
        'ProfileController@edit'
    )->middleware('can:edit,user');
});

Route::get('/profiles/{user:name}', 'ProfileController@show')->name('profile');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
