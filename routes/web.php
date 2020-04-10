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

Route::get('/', 'PagesController@home');
Route::get('/searchBook', 'BooksController@searchBook');
Route::get('/searchCat', 'CategoriesController@searchCat');
Route::get('/searchTea', 'TeachersController@searchTea');
Route::get('/searchStud', 'BatchesController@searchStud');

Route::resource('categories','CategoriesController');
Route::resource('books','BooksController');
Route::resource('access_nos','AccessnosController');
Route::resource('batches','BatchesController');
Route::resource('students','StudentsController');
Route::resource('teachers','TeachersController');
Route::resource('issuestuds','IssuestudsController');
Route::resource('issueteachers','IssueteachersController');
