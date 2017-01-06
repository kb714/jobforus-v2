<?php

/**
 * Auth Routes
 */
Auth::routes();
/**
 * Public Routes
 */
Route::get('/', 'HomeController@index')->name('home');
/**
 * Dashboard Namespace
 */
Route::group(['namespace' => 'Dashboard'], function(){
    Route::get('cuenta', 'DashboardController@index')->name('dashboard.index');
    Route::group(['namespace' => 'Account', 'prefix' => 'cuenta'], function(){
        Route::resource('cartas', 'CoverLettersController',
            [
                'except' => ['edit', 'update'],
                'names' => 'letters'
            ]
        );
        Route::resource('informacion-personal', 'PersonalInformationController',
            [
                'only' => ['index', 'store'],
                'names' => 'personal-information'
            ]
        );
        Route::resource('informacion-adicional', 'AdditionalInformationController',
            [
                'only' => ['index', 'store'],
                'names' => 'additional-information'
            ]
        );
        Route::resource('seguridad', 'SecurityController',
            [
                'only' => ['index', 'store'],
                'names' => 'security'
            ]
        );
    });
});

/**
 * Administrator Namespace
 */
Route::group(['namespace' => 'AuthAdmin', 'prefix' => 'admin'], function(){
    Route::get('login','LoginController@showLoginForm')->name('admin.login');
    Route::post('login','LoginController@login');
    Route::post('logout','LoginController@logout')->name('admin.logout');

// Registration Routes...
    Route::get('register', 'LoginController@showRegistrationForm');
    Route::post('register', 'LoginController@register');
});
Route::group(['namespace' => 'Admin'], function(){
    Route::get('admin', 'AdminController@index')->name('admin.index');
    Route::group(['prefix' => 'admin'], function(){
//        job types route
        Route::resource('tipos-de-trabajo', 'JobTypesController', [
            'names' => 'job-types'
        ]);
//        users route
        Route::resource('usuarios', 'UsersController', [
            'names' => 'users'
        ]);
    });
});

