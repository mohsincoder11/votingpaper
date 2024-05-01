<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return redirect()->back();
    //return "All cache cleared!";
});
//website route start/////////
Route::view('/', 'website.index')->name('home');
Route::view('/sign-in', 'website.sign-in')->name('sign-in');
Route::post('/sign-in-attempt', 'WebsiteController@sign_in_attempt')->name('sign-in-attempt');
Route::view('/sign-up', 'website.sign-up')->name('sign-up');
Route::post('/sign-up-save', 'WebsiteController@sign_up_save')->name('sign-up-save');
Route::get('/log-out', 'WebsiteController@log_out')->name('log-out');

//website route end/////////

//admin route///////////////////////////////
Route::view('/login', 'login')->name('login');
Route::get('checklogin', 'AdminController@checklogin')->name('checklogin');
//admin route///////////////////////////////

//     Route::prefix('vendor')->name('vendor.')->group(function () {

// Route::get('dashboard', 'VendorController@dashboard')->name('dashboard');
// });


Route::group(['middleware' => ['Admin_logincheck']], function () {
    Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
    Route::get('usermanage', 'AdminController@usermanage')->name('usermanage');
    Route::get('notification', 'AdminController@notification')->name('notification');
    Route::get('send_notification', 'AdminController@send_notification')->name('send_notification');
    Route::get('get_user_byentity', 'AdminController@get_user_byentity')->name('get_user_byentity');

    //election
    Route::get('addelection', 'ElectionController@addelection')->name('addelection');
    Route::get('addedelection', 'ElectionController@addedelection')->name('addedelection');
    Route::get('editelection/{id}', 'ElectionController@editelection')->name('editelection');
    Route::get('election-result', 'ElectionController@election_result')->name('election_result');
    Route::get('view_election_list', 'ElectionController@view_election_list')->name('view_election_list');
    Route::get('view_election_result/{election_id}', 'ElectionController@view_election_result')->name('view_election_result');
    Route::get('live-election', 'ElectionController@live_election')->name('live_election');;

    //entity
    Route::get('addentity', 'EntityController@addentity')->name('addentity');
    Route::get('addedentity', 'EntityController@addedentity')->name('addedentity');
    Route::get('editentity/{id}', 'EntityController@editentity')->name('editentity');

    ///ibc
    Route::get('addibc', 'ResolutionController@addibc')->name('addibc');
    Route::get('addedibc', 'ResolutionController@addedibc')->name('addedibc');
    Route::get('editibcvoting/{id}', 'ResolutionController@editibcvoting')->name('editibcvoting');
    Route::get('live_ibc_voting', 'ResolutionController@live_ibc_voting')->name('live_ibc_voting');;
    Route::get('ibc_result', 'ResolutionController@ibc_result')->name('ibc_result');
    Route::get('view_ibc_result/{id}', 'ResolutionController@view_ibc_result')->name('view_ibc_result');



    //survey
    Route::get('add-survey', 'SurveyController@add_survey')->name('add_survey');
    Route::get('added-survey', 'SurveyController@added_survey')->name('added_survey');
    Route::get('live-survey', 'SurveyController@live_survey')->name('live_survey');
    Route::get('survey-result', 'SurveyController@survey_result')->name('survey_result');
    Route::get('view-survey-result/{id}', 'SurveyController@view_survey_result')->name('view_survey_result');
});
 
Route::get('get_all_adminnotification', 'AdminController@get_all_adminnotification')->name('get_all_adminnotification');
Route::get('delete_notification', 'AdminController@delete_notification')->name('delete_notification');
Route::get('get_single_notification', 'AdminController@get_single_notification')->name('get_single_notification');
Route::get('delete_single_notification', 'AdminController@delete_single_notification')->name('delete_single_notification');
Route::get('edit_notification', 'AdminController@edit_notification')->name('edit_notification');


Route::get('addusermanage', 'AdminController@addusermanage')->name('addusermanage');
Route::get('updateusermanage', 'AdminController@updateusermanage')->name('updateusermanage');
Route::get('getalluser', 'AdminController@getalluser')->name('getalluser');
Route::get('editusermanage', 'AdminController@editusermanage')->name('editusermanage');
Route::get('deleteusermanage', 'AdminController@deleteusermanage')->name('deleteusermanage');
Route::get('checkusername', 'AdminController@checkusername')->name('checkusername');
Route::get('signout', 'AdminController@signout')->name('signout');
//Registration
Route::get('registration', 'RegistrationController@registration')->name('registration');
Route::post('register', 'RegistrationController@register')->name('register');

//Election

Route::get('send_remaining_voter_notification', 'ElectionController@send_remaining_voter_notification')->name('send_remaining_voter_notification');
Route::get('insertelection', 'ElectionController@insertelection')->name('insertelection');
Route::get('updateelection', 'ElectionController@updateelection')->name('updateelection');
Route::post('insertelectionvoteruserlist', 'ElectionController@insertelectionvoteruserlist')->name('insertelectionvoteruserlist');

Route::get('removeelectionvoterlistdata', 'ElectionController@removeelectionvoterlistdata')->name('removeelectionvoterlistdata');

Route::get('deleteelectionvoterlist', 'ElectionController@deleteelectionvoterlist')->name('deleteelectionvoterlist');
Route::get('updateelectionsinglevoterlist', 'ElectionController@updateelectionsinglevoterlist')->name('updateelectionsinglevoterlist');

Route::get('getelectionsinglevoterlist', 'ElectionController@getelectionsinglevoterlist')->name('getelectionsinglevoterlist');

Route::get('insertelectionbilling', 'ElectionController@insertelectionbilling')->name('insertelectionbilling');
Route::get('getallelectionrow', 'ElectionController@getallelectionrow')->name('getallelectionrow');
Route::get('deleteelection', 'ElectionController@deleteelection')->name('deleteelection');
Route::get('getelectionvoterlistdata', 'ElectionController@getelectionvoterlistdata')->name('getelectionvoterlistdata');
Route::get('removeelectionvoterlistdata', 'ElectionController@removeelectionvoterlistdata')->name('removeelectionvoterlistdata');
Route::get('add_position_election', 'ElectionController@add_position_election')->name('add_position_election');
Route::get('delete_position_election', 'ElectionController@delete_position_election')->name('delete_position_election');
Route::get('get_position_election', 'ElectionController@get_position_election')->name('get_position_election');
Route::post('insert_election_candidate', 'ElectionController@insert_election_candidate')->name('insert_election_candidate');
Route::get('deletesvsp_candidate', 'ElectionController@deletesvsp_candidate')->name('deletesvsp_candidate');
Route::get('editsvsp_candidate', 'ElectionController@editsvsp_candidate')->name('editsvsp_candidate');
Route::get('add_groupname_election', 'ElectionController@add_groupname_election')->name('add_groupname_election');
Route::get('delete_groupname_election', 'ElectionController@delete_groupname_election')->name('delete_groupname_election');
Route::get('get_groupname_election', 'ElectionController@get_groupname_election')->name('get_groupname_election');
Route::get('getelectionvoterlistedit', 'ElectionController@getelectionvoterlistedit')->name('getelectionvoterlistedit');
Route::get('get_candidate_Data', 'ElectionController@get_candidate_Data')->name('get_candidate_Data');




//Entity
Route::get('insertentity', 'EntityController@insertentity')->name('insertentity');
Route::get('ibcentityinfo', 'EntityController@ibcentityinfo')->name('ibcentityinfo');
Route::get('ibcentityinfoupdate', 'EntityController@ibcentityinfoupdate')->name('ibcentityinfoupdate');
Route::get('ibcentityaddress', 'EntityController@ibcentityaddress')->name('ibcentityaddress');
Route::get('ibcentityauthperson', 'EntityController@ibcentityauthperson')->name('ibcentityauthperson');
Route::post('ibcentitykyc', 'EntityController@ibcentitykyc')->name('ibcentitykyc');
Route::post('ibcentitykycupdate/{id}', 'EntityController@ibcentitykycupdate')->name('ibcentitykycupdate');
Route::get('getallentity', 'EntityController@getallentity')->name('getallentity');
Route::get('getentitylist', 'EntityController@getentitylist')->name('getentitylist');
Route::get('deleteentity', 'EntityController@deleteentity')->name('deleteentity');
Route::get('getsingleentity', 'EntityController@getsingleentity')->name('getsingleentity');
Route::get('printentityview/{id}', 'EntityController@printentityview')->name('printentityview');
Route::get('get_city', 'EntityController@get_city')->name('get_city');
Route::get('verify_entity_mobile', 'EntityController@verify_entity_mobile')->name('verify_entity_mobile');
Route::get('verify_entity_email', 'EntityController@verify_entity_email')->name('verify_entity_email');
Route::get('send_email_mob_otp', 'EntityController@send_email_mob_otp')->name('send_email_mob_otp');


//IBC Resolution 

Route::get('get_ibc_que_ans', 'ResolutionController@get_ibc_que_ans')->name('get_ibc_que_ans');
Route::get('send_remaining_ibc_voter_notification', 'ResolutionController@send_remaining_ibc_voter_notification')->name('send_remaining_ibc_voter_notification');
Route::get('gettime', 'ResolutionController@gettime')->name('gettime');

Route::get('addcreatepoll', 'ResolutionController@addcreatepoll')->name('addcreatepoll');
Route::get('updatecreatepoll', 'ResolutionController@updatecreatepoll')->name('updatecreatepoll');
Route::get('getallibcvotingrow', 'ResolutionController@getallibcvotingrow')->name('getallibcvotingrow');
Route::get('deleteibcvoting', 'ResolutionController@deleteibcvoting')->name('deleteibcvoting');
Route::post('insertvoteruserlist', 'ResolutionController@insertvoteruserlist')->name('insertvoteruserlist');
Route::get('removevoterlistdata', 'ResolutionController@removevoterlistdata')->name('removevoterlistdata');
Route::get('deletevoterlist', 'ResolutionController@deletevoterlist')->name('deletevoterlist');
Route::get('updatesinglevoterlist', 'ResolutionController@updatesinglevoterlist')->name('updatesinglevoterlist');
Route::get('getsinglevoterlist', 'ResolutionController@getsinglevoterlist')->name('getsinglevoterlist');
Route::get('getvoterlistafterdu', 'ResolutionController@getvoterlistafterdu')->name('getvoterlistafterdu');
Route::post('insertresolution', 'ResolutionController@insertresolution')->name('insertresolution');
Route::get('deleteresolutionlist', 'ResolutionController@deleteresolutionlist')->name('deleteresolutionlist');

Route::get('insertbilling', 'ResolutionController@insertbilling')->name('insertbilling');
Route::get('getibcvoterdata', 'ResolutionController@getibcvoterdata')->name('getibcvoterdata');
Route::get('getibcresoultiondata', 'ResolutionController@getibcresoultiondata')->name('getibcresoultiondata');
Route::get('upresolutionrow', 'ResolutionController@upresolutionrow')->name('upresolutionrow');
Route::get('downresolutionrow', 'ResolutionController@downresolutionrow')->name('downresolutionrow');
Route::get('getvoterlistedit', 'ResolutionController@getvoterlistedit')->name('getvoterlistedit');
Route::get('getsingleeditresolution', 'ResolutionController@getsingleeditresolution')->name('getsingleeditresolution');
Route::get('convertexcel', 'ResolutionController@convertexcel')->name('convertexcel');

//Survey
Route::get('insertsurvey', 'SurveyController@insertsurvey')->name('insertsurvey');
Route::get('updatesurvey', 'SurveyController@updatesurvey')->name('updatesurvey');
Route::post('insertsurveyvoteruserlist', 'SurveyController@insertsurveyvoteruserlist')->name('insertsurveyvoteruserlist');
Route::get('deletesurveyvoterlist', 'SurveyController@deletesurveyvoterlist')->name('deletesurveyvoterlist');
Route::post('add_survey_questionier', 'SurveyController@add_survey_questionier')->name('add_survey_questionier');
Route::get('deletesurveyquestion', 'SurveyController@deletesurveyquestion')->name('deletesurveyquestion');
Route::get('getsurveypreviewdata', 'SurveyController@getsurveypreviewdata')->name('getsurveypreviewdata');
Route::get('insertsurveybilling', 'SurveyController@insertsurveybilling')->name('insertsurveybilling');
Route::get('getallsurveyrow', 'SurveyController@getallsurveyrow')->name('getallsurveyrow');
Route::get('delete_survey', 'SurveyController@delete_survey')->name('delete_survey');
Route::get('send_remaining_survey_voter_notification', 'SurveyController@send_remaining_survey_voter_notification')->name('send_remaining_survey_voter_notification');
Route::get('get_survey_describeans', 'SurveyController@get_survey_describeans')->name('get_survey_describeans');





//user Part
Route::group(['middleware' => ['User_logincheck']], function () {
    Route::get('user-dashboard', 'Api_controller@user_dashboard')->name('user_dashboard');
    Route::get('addelectionvoting/{id}/{user_id}', 'Api_controller@addelectionvoting')->name('addelectionvoting');
    Route::get('electiondetails', 'Api_controller@electiondetails')->name('electiondetails');
    Route::get('addibcvoting/{id}/{user_id}', 'Api_controller@addibcvoting')->name('addibcvoting');
    Route::get('ibcdetails', 'Api_controller@ibcdetails')->name('ibcdetails');
    Route::get('que_for_survey/{id}/{user_id}', 'Api_controller@que_for_survey')->name('que_for_survey');
    Route::get('surveydetails', 'Api_controller@surveydetails')->name('surveydetails');
    Route::get('user-feedback', 'Api_controller@user_feedback')->name('user_feedback');
    Route::get('user-profile', 'Api_controller@user_profile')->name('user_profile');
    Route::get('receipt', 'Api_controller@receipt')->name('receipt');
    Route::get('user_notification', 'Api_controller@user_notification')->name('user_notification');
    Route::get('user-profile', 'Api_controller@user_profile')->name('user_profile');
});

Route::get('user_signout', 'Api_controller@user_signout')->name('user_signout');
Route::get('user-login', 'Api_controller@user_login')->name('user_login');
Route::get('checkuser_login2', 'Api_controller@checkuser_login2')->name('checkuser_login2');
Route::get('sortable', 'Api_controller@sortable')->name('sortable');
