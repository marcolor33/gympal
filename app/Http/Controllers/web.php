<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('guest_home');
});


Route::get('/case',['uses'=>'AdminController@public_list_case','as'=>'public_list_case']);

Route::get('/case/{case_id}',['uses'=>'AdminController@public_view_case','as'=>'public_view_case']);
Route::get('/coach',['uses'=>'AdminController@public_list_coach','as'=>'public_list_coach']);
Route::get('/coach/{account_id}',['uses'=>'AdminController@public_view_coach','as'=>'public_view_coach']);

Route::get('/student/{student_id}', ['uses' => 'AdminController@view_student', 'as' => 'view_student']);

    
Route::get('student', ['uses' => 'AdminController@list_student','as' => 'list_student']);

 Route::get('create_case',[
        'uses' => 'CreateCaseController@prepareForm',
        'as' => 'create_case'
    ]);

Route::get('/topcoach',['uses'=>'AdminController@list_topcoach','as'=>'list_topcoach']);


Route::get('/image',['uses'=>'StorageController@view_image','as'=>'view_image']);

Route::get('/forget_password',['uses'=>'EmailController@forget_password','as'=>'forget_password']);

Route::post('/forget_password_email',['uses'=>'EmailController@forget_password_email','as'=>'forget_password_email']);

Route::get('/reset_password',['uses'=>'EmailController@reset_password','as'=>'reset_password']);

Route::post('/reset_password_post',['uses'=>'EmailController@reset_password_post','as'=>'reset_password_post']);

Route::post('/verify_account_post/{account_id}',['uses'=>'EmailController@verify_account_post','as'=>'verify_account_post']);

Route::get('/verify_account',['uses'=>'EmailController@verify_account','as'=>'verify_account']);


//Route::get('/error', function () {
//    return view('error');
//});

Route::get('/index', function () {
    return view('index');
});


Route::get('/myprofile',['uses'=>'AdminController@myprofile','as'=>'myprofile']);
Route::get('/mycase',['uses'=>'AdminController@mycase','as'=>'mycase']);

Route::get('/home',['uses'=>'AdminController@home','as'=>'home']);
Route::get('list_student_interest', ['uses' => 'AdminController@list_student_interest','as' => 'list_student_interest']);


//Login Testing
Route::group(['middleware' => ['web']], function() {
  
    
    Route::get('/login', [ 'uses' => 'LoginController@getLogin', 'as' => 'getLogin']);
    Route::post('/startLogin', [ 'uses' => 'LoginController@login', 'as' => 'startLogin']);
  
});

Route::get('/error', function () { return view('error'); });

Route::get('/loginCheck', ['uses' => 'LoginController@getCheckUser',
    'as' => 'loginCheck']);

Route::group(['middlewareGroups' => ['web']], function () {
    Route::get('/auth', ['uses' => 'LoginController@getCheckUser',
    'as' => 'checkAuth']);
});
//End of Testing

Route::group(['prefix' => 'student'], function () {
    Route::get('home', ['uses' => 'StudentController@student_home',
    'as' => 'student_home']);
    
    Route::get('myprofile', ['uses' => 'StudentController@student_myprofile',
    'as' => 'student_myprofile']);
    
    
         Route::get('mycase', ['uses' => 'StudentController@student_list_mycase',
    'as' => 'student_list_mycase']);
    
            
        Route::get('mycase/{case_id}', ['uses' => 'StudentController@student_view_mycase',
    'as' => 'student_view_mycase']);
    
        Route::get('coach', ['uses' => 'StudentController@student_list_coach',
    'as' => 'student_list_coach']);
    
    
     Route::get('coach/{coach_id}', ['uses' => 'StudentController@student_view_coach',
    'as' => 'student_view_coach']);
    
});

Route::group(['prefix' => 'coachaa'], function () {
    Route::get('home', ['uses' => 'CoachController@coach_home',
    'as' => 'coach_home']);
    
        Route::get('myprofile', ['uses' => 'CoachController@coach_myprofile',
    'as' => 'coach_myprofile']);
    
    Route::get('case', ['uses' => 'CoachController@coach_list_case',
    'as' => 'coach_list_case']);
    
    Route::get('case/{case_id}', ['uses' => 'CoachController@coach_view_case',
    'as' => 'coach_view_case']);
    
    
        Route::get('mycase', ['uses' => 'CoachController@coach_list_mycase',
    'as' => 'coach_list_mycase']);
    
            
        Route::get('mycase/{case_id}', ['uses' => 'CoachController@coach_view_mycase',
    'as' => 'coach_view_mycase']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::get('home', [
        'uses' => 'AdminController@admin_home',
        'as' => 'admin_home'
    ]);
    


    Route::get('coach', [
        'uses' => 'AdminController@list_coach',
        'as' => 'list_coach'
    ]);


        Route::get('case', [
        'uses' => 'AdminController@list_case',
        'as' => 'list_case'
    ]);


        Route::get('case/{case_id}', [
        'uses' => 'AdminController@view_case',
        'as' => 'view_case'
    ]);

    
    Route::get('district', [
        'uses' => 'AdminController@list_district',
        'as' => 'list_district'
    ]);
    
    
    Route::get('district/add_district',[
        'uses' => 'AdminController@add_district',
        'as' => 'add_district'

    ]);
    
    Route::get('district/{district_id}', [
        'uses' => 'AdminController@view_district',
        'as' => 'view_district'
    ]);
        

    


    Route::get('category', [
        'uses' => 'AdminController@list_category',
        'as' => 'list_category'
    ]);


    Route::get('category/add_category',[
        'uses' => 'AdminController@add_category',
        'as' => 'add_category'

    ]);


        Route::get('coach/{coach_id}', [
        'uses' => 'AdminController@view_coach',
        'as' => 'view_coach'
    ]);


           Route::get('category/{category_id}/add_subject', [
        'uses' => 'AdminController@add_subject',
        'as' => 'add_subject'
    ]);
    
        Route::get('category/{category_id}', [
        'uses' => 'AdminController@view_category',
        'as' => 'view_category'
    ]);

    Route::get('category/subject/{subject_id}', [
        'uses' => 'AdminController@view_subject',
        'as' => 'view_subject'
    ]);
    
    
    Route::get('/delete_district/{district_id}', [
	'uses' => 'AdminController@delete_district',
	'as' => 'delete_district'
]);
    
    Route::get('/delete_category/{category_id}', [
	'uses' => 'AdminController@delete_category',
	'as' => 'delete_category'
]);

Route::get('/category/delete_subject/{subject_id}', [
	'uses' => 'AdminController@delete_subject',
	'as' => 'delete_subject'
]);



Route::post('/category/{category_id}/create_subject',[
	'uses' => 'AdminController@create_subject',
	'as' => 'create_subject'
]);



Route::post('/district/edit_district/{district_id}', [
	'uses' => 'AdminController@edit_district',
	'as' => 'edit_district'
]);


Route::post('/category/edit_category/{category_id}', [
	'uses' => 'AdminController@edit_category',
	'as' => 'edit_category'
]);

Route::post('/category/subject/edit_subject/{subject_id}', [
	'uses' => 'AdminController@edit_subject',
	'as' => 'edit_subject'
]);

Route::post('/create_district', [
	'uses' => 'AdminController@create_district',
	'as' => 'create_district'
]);
    
    
Route::post('/create_category', [
	'uses' => 'AdminController@create_category',
	'as' => 'create_category'
]);

Route::post('/delete_districts', [
	'uses' => 'AdminController@delete_districts',
	'as' => 'delete_districts'
]);    
    
Route::post('/delete_categories', [
	'uses' => 'AdminController@delete_categories',
	'as' => 'delete_categories'
]);

Route::post('/category/delete_subjects', [
	'uses' => 'AdminController@delete_subjects',
	'as' => 'delete_subjects'
]);
    
    
});



Route::get('/studentApply', [
    'uses' => 'StudentApplyController@prepareForm',
    'as' => 'studentApply',
]);


Route::get('/coachApply', [
    'uses' => 'CoachApplyController@prepareForm',
    'as' => 'coachApply'
]);


//
//
//Route::get('/public_coach', [
//	'uses' => 'AdminController@public_list_coach',
//	'as' => 'public_list_coach'
//]);

//
//Route::get('/public_coach/{coach_id}', [
//	'uses' => 'AdminController@public_view_coach',
//	'as' => 'public_view_coach'
//]);


Route::post('/star_coach/{account_id}', [
	'uses' => 'AdminController@star_coach',
	'as' => 'star_coach'
]);

Route::post('/approve_coach/{account_id}', [
	'uses' => 'AdminController@approve_coach',
	'as' => 'approve_coach'
]);


Route::post('/enable_account/{account_id}', [
	'uses' => 'AdminController@enable_account',
	'as' => 'enable_account'
]);

Route::post('/top_coach/{account_id}', [
	'uses' => 'AdminController@top_coach',
	'as' => 'top_coach'
]);


Route::post('/up_topcoach/{account_id}', [
	'uses' => 'AdminController@up_topcoach',
	'as' => 'up_topcoach'
]);

Route::post('/down_topcoach/{account_id}', [
	'uses' => 'AdminController@down_topcoach',
	'as' => 'down_topcoach'
]);


Route::post('/delete_account/{account_id}', [
	'uses' => 'AdminController@delete_account',
	'as' => 'delete_account'
]);

Route::post('/delete_case/{case_id}', [
	'uses' => 'AdminController@delete_case',
	'as' => 'delete_case'
]);


Route::get('/logout', [
	'uses' => 'LoginController@logout',
	'as' => 'logout'
]);

Route::post('/student/edit_student_profile',['uses' => 'AdminController@edit_student_profile','as'=>'edit_student_profile']);

Route::post('/coachRegister','CoachApplyController@store');

Route::post('/studentRegister','StudentApplyController@store');

Route::post('/store_case',['uses'=>'CreateCaseController@store_case','as'=>'store_case']);

Route::post('/change_password',['uses'=>'AdminController@change_password','as'=>'change_password']);


Route::get('/new_static',['uses' => 'AdminController@new_static','as'=>'new_static']);

Route::get('/static',['uses' => 'AdminController@list_static','as'=>'list_static']);
Route::get('/static/{name}',['uses' => 'AdminController@view_static','as'=>'view_static']);

Route::post('/edit_static/{name}',['uses' => 'AdminController@edit_static','as'=>'edit_static']);


Route::post('/create_static',['uses' => 'AdminController@create_static','as'=>'create_static']);



Route::post('/{case_id}/show_interest',['uses'=>'CoachController@show_interest','as'=>'show_interest']);
Route::post('/{case_id}/cancel_interest',['uses'=>'CoachController@cancel_interest','as'=>'cancel_interest']);

Route::post('/student_show_interest',['uses'=>'AdminController@student_show_interest','as'=>'student_show_interest']);
Route::post('/student_cancel_interest',['uses'=>'AdminController@student_cancel_interest','as'=>'student_cancel_interest']);

Route::post('/student_interest_new',['uses'=>'AdminController@student_interest_new','as'=>'student_interest_new']);
Route::post('/student_interest_seen',['uses'=>'AdminController@student_interest_seen','as'=>'student_interest_seen']);
Route::post('/student_interest_delete',['uses'=>'AdminController@student_interest_delete','as'=>'student_interest_delete']);


Route::post('/edit_coach_district',['uses'=>'AdminController@edit_coach_district','as'=>'edit_coach_district']);

Route::post('/edit_coach_time',['uses'=>'AdminController@edit_coach_time','as'=>'edit_coach_time']);

Route::post('/edit_coach_subject',['uses'=>'AdminController@edit_coach_subject','as'=>'edit_coach_subject']);

Route::post('/edit_coach_info',['uses'=>'AdminController@edit_coach_info','as'=>'edit_coach_info']);

Route::post('/edit_coach_cv',['uses'=>'AdminController@edit_coach_cv','as'=>'edit_coach_cv']);

Route::post('/edit_interested',['uses'=>'AdminController@edit_interested','as'=>'edit_interested']);

Route::post('/edit_case',['uses'=>'AdminController@edit_case','as'=>'edit_case']);
Route::post('/edit_case_status',['uses'=>'AdminController@edit_case_status','as'=>'edit_case_status']);

Route::post('/delete_file',['uses'=>'AdminController@delete_file','as'=>'delete_file']);

Route::post('/delete_profile_pic',['uses'=>'AdminController@delete_profile_pic','as'=>'delete_profile_pic']);