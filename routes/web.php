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

# Les articles
Route::get('/', 'PostsController@index')->name('posts');
Route::get('search', 'SearchController@index')->name('search');
Route::get('search/{search}', 'SearchController@index')->name('search.show');

Route::group(['prefix' => 'posts'], function () {
    Route::get('/create', 'PostsController@create')->name('posts.create');
    Route::post('', 'PostsController@store')->name('posts.store');
    Route::get('{category}/{post}', 'PostsController@show')->name('posts.show');
    Route::post('{category}/{post}/comments', 'PostsController@addComment')->name('posts.addcomment');
});

Route::group(['prefix' => 'projects'], function () {
    Route::get('', 'ProjectsController@index')->name('projects.index');
    Route::get('create', 'ProjectsController@create')->name('projects.create');
    Route::post('', 'ProjectsController@store')->name('projects.store');
    Route::get('{category}/{project}', 'ProjectsController@show')->name('projects.show');
    Route::post('{category}/{project}/comments', 'ProjectsController@addComment')->name('projects.addcomment');

});


/**
 # Les profils
 Route::get('/', 'ProfileController@index');
 Route::get('profile/{user}', 'ProfileController@show');
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
