<?php

/**
 * Auth Routes
 */
Auth::routes();
/**
 * Public Routes
 */
Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/buscar', 'HomeController@search')->name('home.search');
//contact post
Route::post('contacto', 'HomeController@contact')->name('home.contact');
/**
 * Dashboard Namespace
 */
Route::group(['namespace' => 'Dashboard'], function(){
    Route::get('cuenta', 'DashboardController@index')->name('dashboard.index');
    Route::post('cuenta', 'DashboardController@generateOrder')->name('dashboard.order');
    Route::delete('cuenta', 'DashboardController@destroyOrder');
    Route::group(['prefix' => 'cuenta'], function(){
        Route::resource('cartas', 'CoverLettersController',
            [
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
        // users route
        Route::resource('perfil', 'ProfileController', [
            'only' => ['index', 'store'],
            'names' => 'admin-profile'
        ]);
        // admin users
        Route::resource('administradores', 'AdminUserController', [
            'except' => ['show'],
            'names' => 'admin-users'
        ]);
        // job types route
        Route::resource('tipos-de-trabajo', 'JobTypesController', [
            'names' => 'job-types'
        ]);
        // membership's
        Route::resource('membresias', 'MembershipController', [
            'names' => 'memberships'
        ]);
        //admin plans
        Route::resource('planes', 'PlanController', [
            'names' => 'admin-plans'
        ]);
        // users route
        Route::resource('usuarios', 'UsersController', [
            'names' => 'users'
        ]);
        Route::post('usuarios/cambiar-plan', 'UsersController@changePlan')->name('users.change-plan');
        // CoverLetters route
        Route::resource('cartas', 'CoverLettersController', [
            'only'  => ['index', 'edit', 'update', 'destroy'],
            'names' => 'cover-letters'
        ]);
        //page content
        Route::resource('paginas', 'PagesController', [
            'only'  => ['index', 'edit', 'update'],
            'names' => 'pages'
        ]);
    });
});

/**
 * Public routes
 */

//show cover letter
Route::get('{slug}', 'HomeController@page')->name('home.page');
Route::get('{id}', 'HomeController@show')->name('home.show');

