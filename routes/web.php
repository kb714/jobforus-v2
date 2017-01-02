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
    Route::get('cuenta/nueva-carta', 'CoverLettersController@create')
        ->name('dashboard.coverLetters.create');
});

