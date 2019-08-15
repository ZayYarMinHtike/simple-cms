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
    // Route::view('/', 'welcome');

    Auth::routes();

    //User
    Route::get('/', 'PostController@all');
    Route::get('/posts/{post}', 'PostController@single');
    Route::get('/user/{any}', 'UserController@index')->where('any', '.*');
    Route::resource('api/posts', 'UserPostController');
    

    //Admin
    Route::get('/administrator', 'AdminController@index');
    Route::get('/login/admin', 'Auth\AdminLoginController@showAdminLoginForm')->name('login.admin');
    Route::post('/login/admin', 'Auth\AdminLoginController@adminLogin');

    //Manager
    Route::get('/manager', 'ManagerController@index');
    Route::get('/login/manager', 'Auth\ManagerLoginController@showManagerLoginForm')->name('login.manager');
    Route::post('/login/manager', 'Auth\ManagerLoginController@managerLogin');
   
    //comment
    Route::get('/{post}/comments', 'CommentController@index');
    Route::post('/{post}/comments', 'CommentController@store');
