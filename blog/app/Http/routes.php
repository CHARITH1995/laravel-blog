<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware'=>['web']],function(){
    //Authentication routes
    Route::get('auth/login',['uses'=>'Auth\AuthController@getLogin','as'=>'login']);
    Route::post('auth/login','Auth\AuthController@postLogin');
    Route::get('auth/logout','Auth\AuthController@getLogout');
    //register routes
    Route::get('auth/register','Auth\AuthController@getRegister');
    Route::post('auth/register','Auth\AuthController@postRegister');
    //password reset
    Route::get('password/reset/{token?}','Auth\PasswordController@showResetForm');
    Route::post('password/email','Auth\PasswordController@showResetLinkEmail');
    Route::post('password/reset','Auth\PasswordController@reset');

    Route::resource('categories','categoryController');
    Route::get('blog/{slug}',['as'=>'blog.single','uses'=>'BlogController@getSingle'])
        ->where('slug', '[\w\d\-\_]+');


    Route::post('comments/{post_id}', ['uses' => 'CommentController@store', 'as' => 'comments.store']);
    Route::get('comments/{id}/edit', ['uses' => 'CommentController@edit', 'as' => 'comments.edit']);
    Route::put('comments/{id}', ['uses' => 'CommentController@update', 'as' => 'comments.update']);
    Route::delete('comments/{id}', ['uses' => 'CommentController@destroy', 'as' => 'comments.destroy']);
    Route::get('comments/{id}/delete', ['uses' => 'CommentController@delete', 'as' => 'comments.delete']);




    Route::get('news',['uses'=>'BlogController@getArchive','as'=>'news.index']);
    Route::get('contact','PagesController@getContact');
    Route::get('about','PagesController@About');
    Route::get('/','PagesController@getIndex');
    Route::resource('posts','PostController');
});




Route::auth();

Route::get('/home', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');
