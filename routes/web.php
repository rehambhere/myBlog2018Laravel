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


Route::resource('/','FrontEndController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix'=>'admin','middleware'=>'auth'],function (){
    Route::resource('/users','UsersController');
   Route::get('/users/admin/{id}',[
       'uses'=>'UsersController@admin',
       'as'=>'users.admin'
   ]);
    Route::get('/users/not-admin/{id}',[
        'uses'=>'UsersController@not_admin',
        'as'=>'users.not.admin'
    ]);
    Route::resource('/posts','PostsController');
    Route::resource('/categories','CategoriesController');
    Route::resource('/tags','TagsController');


    Route::get('/profiles',[
       'uses'=> 'ProfilesController@index',
            'as'=>'profiles.index'
        ]
    );
    Route::post('/profiles/update',[
        'uses'=>'ProfilesController@update',
           'as'=>'profiles.update'
             ]);

    Route::get('/settings',[
            'uses'=> 'SettingsController@index',
            'as'=>'settings.index'
        ]
    );
    Route::post('/settings/update',[
            'uses'=> 'SettingsController@update',
            'as'=>'settings.update'
        ]
    );

});

