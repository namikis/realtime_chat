<?php

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

Route::get('/', 'homeController@top');

Route::get('/signUp', 'loginController@signUp');
Route::post('/signUp', 'loginController@register');

Route::get('/login', 'loginController@login');
Route::post('/login', 'loginController@auth');
Route::get('/logout', 'loginController@logout');

Route::get('/index', 'postController@index');
Route::get('/index/post', 'postController@post_form');
Route::get('/post/mine', 'postController@post_mine');

Route::post('/index/post', 'postController@post_done');

Route::get('/index/post/detail/{id}', 'postController@post_detail');
Route::get('/index/post/detail/mine/{id}', 'postController@post_detail_mine');

Route::post('/index/post/match', 'chatController@post_match');
Route::get('/post/match/list', 'chatController@post_list');
Route::get('/chat', 'chatController@chat_room');