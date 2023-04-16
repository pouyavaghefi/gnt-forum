<?php

use Illuminate\Support\Facades\Route;

Route::middleware('notLoggedIn')->group(function () {
	Route::get('register', 'Auth\AuthController@register')->name('auth.register');
	Route::post('register/new', 'Auth\AuthController@registerNew')->name('auth.register.new');
	Route::get('/checkUserNameExists', 'Auth\ToolsController@checkUsernameExists');
	Route::get('/checkMobilePhoneExists', 'Auth\ToolsController@checkMobileNumberExists');
	
	Route::prefix('login')->group(function () {
		Route::match(['GET','POST'],'/', 'Auth\AuthController@login')->name('auth.login');
		Route::prefix('next')->group(function () {
			Route::get('/', 'Auth\AuthController@loginNext')->name('auth.login.next');

			Route::get('/signInWithPassword', 'Auth\AuthController@signInWithPassword')->name('auth.login.next.passwd');
			Route::post('/signInWithPassword', 'Auth\AuthController@signInWithPasswordProcess');

			Route::get('/signInWithToken/{e?}', 'Auth\AuthController@signInWithToken')->name('auth.login.next.token');
			Route::post('/signInWithToken', 'Auth\TokenController@signInWithTokenProcess');
		});
	});
});

Route::get('/destroySessions', 'Auth\ToolsController@destroySessions')->name('destroyAuthLoginSessions');


Route::get('/logout', 'Auth\AuthController@logout')->name('auth.logout');

Route::prefix('token')->group(function () {
    Route::get('/get', 'Auth\TokenController@getToken')->name('auth.2fa');
    Route::post('/verify', 'Auth\TokenController@verifyToken')->name('auth.2fa.verify');
});

Route::get('checkUserNameExists', 'Auth\ToolsController@checkUsernameExists');
