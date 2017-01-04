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
 * Dashboard Routes
 */
Route::group(['namespace' => 'Dashboard'], function(){
    Route::get('cuenta', 'DashboardController@index')
        ->name('dashboard');
    Route::group(['namespace' => 'Account', 'prefix' => 'cuenta'], function(){
        Route::resource('cartas', 'CoverLettersController',
            [
                'except' => ['edit', 'update'],
                'names' =>[
                    'store'     => 'letters.store',
                    'index'     => 'letters.index',
                    'create'    => 'letters.create',
                    'destroy'   => 'letters.destroy',
                    'show'      => 'letters.show'
                ]
            ]
        );
        Route::resource('informacion-personal', 'PersonalInformationController',
            [
                'only' => ['index', 'store'],
                'names' => [
                    'index' => 'personal-information.index',
                    'store' => 'personal-information.store'
                ]
            ]
        );
    });
});

