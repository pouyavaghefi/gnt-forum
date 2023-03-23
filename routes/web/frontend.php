<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redis;
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

Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/profile', 'ProfileController@show')->name('profile.show');

Route::get('/get-back', 'ToolsController@get_back_to_prev')->name('get.back');
Route::get('/new-question-exists', 'ToolsController@count_questions');
Route::get('/new-notifications-exists', 'ToolsController@count_notifz');

Route::get('/test1', 'TestController@setQuestionCats');
Route::get('/test2', 'TestController@setQuestionTats');

Route::prefix('questions')->group(function () {
    Route::get('/{question}', 'QuestionController@show')->middleware('auth')->name('question.show');
    Route::middleware('auth')->group(function () {
        Route::post('/{question}/submitAnswer', 'AnswerController@submitAnswer')->name('answer.submit');
        Route::get('/ask/new', 'QuestionController@ask')->name('question.new');
        Route::post('/ask/new', 'QuestionController@submitAsk')->name('question.new.submit');
    });
    Route::post('/{objId}/{objType}/{voteType}/{objUserId}', 'VoteController@vote')->name('vote');
});

Route::prefix('tags')->group(function () {
    Route::get('/', 'TagController@all')->name('tag.index');
    Route::get('/{tag}', 'TagController@tag')->name('tag.single');
});

Route::prefix('cats')->group(function () {
    Route::get('/', 'CategoryController@all')->name('cat.index');
    Route::get('/{cat}', 'CategoryController@cat')->name('cat.single');
});

Route::get('/optimize-clear', 'ToolsController@web_refresh');
Route::get('/clear-sessions', 'ToolsController@flush_sessions');
Route::get('/mark-all-unread-notifications', 'NotificationController')->middleware('auth')->name('markNotificationsAsRead');
Route::post('/mark-as-best-answer/{queCreatorId}/{ansId}/{queId}/{ansCreatorId}', 'BestController')->middleware('auth')->name('answer.markAsBest');


