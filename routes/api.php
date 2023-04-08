<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//user
Route::get('checkuser_login','Api_controller@checkuser_login')->name('checkuser_login');

Route::get('getall_entity','Api_controller@getall_entity')->name('getall_entity');
Route::get('senduser_otp','Api_controller@senduser_otp')->name('senduser_otp');
Route::get('get_sie_count','Api_controller@get_sie_count')->name('get_sie_count');


//REsolution
Route::get('view_ibcresolution','Api_controller@view_ibcresolution')->name('view_ibcresolution');
Route::get('get_resolution_que','Api_controller@get_resolution_que')->name('get_resolution_que');
Route::post('insert_resolution_ans','Api_controller@insert_resolution_ans')->name('insert_resolution_ans');


//Survey
Route::get('view_survey','Api_controller@view_survey')->name('view_survey');
Route::get('get_survey_que','Api_controller@get_survey_que')->name('get_survey_que');

Route::post('insert_survey_ans','Api_controller@insert_survey_ans')->name('insert_survey_ans');


//Election
Route::get('view_election','Api_controller@view_election')->name('view_election');
Route::get('get_election_positions','Api_controller@get_election_positions')->name('get_election_positions');
Route::get('get_election_candidate','Api_controller@get_election_candidate')->name('get_election_candidate');
Route::get('view_election_positions','Api_controller@view_election_positions')->name('view_election_positions');
Route::post('insert_election_ans','Api_controller@insert_election_ans')->name('insert_election_ans');


//feeback

Route::post('insert_user_feedback','Api_controller@insert_user_feedback')->name('insert_user_feedback');


//Notification

Route::get('get_user_notification','Api_controller@get_user_notification')->name('get_user_notification');
Route::get('get_alluser_notification','Api_controller@get_alluser_notification')->name('get_alluser_notification');
