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
    Route::resource('cuenta/cartas', 'CoverLettersController');
});

