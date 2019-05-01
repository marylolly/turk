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

// главная страница
Route::get('/','HomeController@index')->name('home');



if(!app()->runningInConsole()){  // нужно проверить не работает ли в консоле иначе возможны ошибки
    // страницы категорий
    $categories = App\Category::all();
    foreach ($categories as $category) {
        Route::get('/'.$category->alias,'HomeController@category');
        Route::get('/'.$category->alias.'/{alias}','HomeController@show');
    }
    // страница новости
    // Route::get('/{alias}','HomeController@show')->name('home.show')->where('id', '[0-9]+');
    // $news = App\News::all();
   
    // foreach ($news as $record) {
    //     Route::get('/'.$record->alias,'HomeController@show');
    // }
}

Route::get('/image/preview/{path}','HomeController@image_preview')->name('image.preview');
Route::get('/image/detail/{path}','HomeController@image_detail')->name('image.detail');
// Route::get('/', function () {
//     return view('welcome');
// });


// Auth::routes(); // маршруты - пути для авторизации

Route::get('admin', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('admin', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


Route::resource('news', 'NewsController');
Route::resource('categories', 'CategoryController');

// Route::get('/home', 'HomeController@index')->name('home');
