<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::any('/', array('as' => 'welcome',         'uses' => 'WelcomeController@index'));

Route::get('/verify/provider/{token}',  array('as' => 'provider_verification','uses'=>'VerificationController@provider' ));
Route::get('/verify/clinician/{token}', array('as' => 'clinician_verification','uses'=>'VerificationController@clinician' ));
Route::get('/verify/success',           array('as' => 'verify_success','uses'=>'VerificationController@message_board' ));
Route::get('/verify/failed',            array('as' => 'verify_failed','uses'=>'VerificationController@message_board' ));


Route::group(array('namespace'=>'provider', 'prefix' => 'provider'), function(){ 
    Route::any('/login', array('as' => 'provider_login',         'uses' => 'LoginController@loginAction'));
   
    
});

Route::group(array('namespace'=>'provider', 'middleware' => 'provider', 'prefix' => 'provider'), function(){
     Route::any('/dashboard', array('as' => 'provider_dashboard',     'uses' => 'DashboardController@index'));
     Route::any('/profile/', array('as' => 'provider_viewporfile',     'uses' => 'DashboardController@profile'));
     Route::post('/profile_update/', array('as' => 'update_provider_profile',     'uses' => 'DashboardController@update_profile'));
     Route::post('/change_provider_logo/', array('as' => 'change_provider_logo',     'uses' => 'DashboardController@change_provider_logo'));
     
     Route::any('/logout', array('as' => 'provider_logout',           'uses' => 'LoginController@logout'));
     
});



Route::group(array('namespace'=>'admin', 'prefix' => 'admin'), function(){ 
    Route::any('/', array('as' => 'admin',         'uses' => 'LoginController@index'));
    
});


Route::group(array('namespace'=>'admin', 'middleware' => 'admin', 'prefix' => 'admin'), function(){
    Route::get('/dashboard',                     array('as' => 'adm_dashboard',         'uses' => 'DashboardController@index'));
    Route::any('/logout',                        array('as' => 'adm_logout',            'uses' => 'LoginController@logout'));
    Route::get('/changepassword',                array('as' => 'adm_change_password',    'uses' => 'LoginController@change_password'));
    Route::post('/changepassword',               array('as' => 'adm_change_password',    'uses' => 'LoginController@password_update'));
     //sitesettings
    Route::get('/sitesettings', 				 array('as' => 'sitesettings',		    'uses' => 'SitesettingController@index'));
    Route::get('/sitesettings/edit/{id}',		 array('as' => 'sitesettings_edit', 	'uses' => 'SitesettingController@edit'));
    Route::post('/sitesettings/update/', 	     array('as' => 'sitesettings_update',	'uses' => 'SitesettingController@update'));
    
    // cms
    
    Route::get('/cms', 						    array('as' => 'cms',                    'uses' => 'CmsController@index'));
    Route::get('/cms/create', 					array('as' => 'cms_create',             'uses' => 'CmsController@create'));
    Route::post('/cms/store', 					array('as' => 'cms_store',              'uses' => 'CmsController@store'));
    Route::get('/cms/edit/{id}', 				array('as' => 'cms_edit',               'uses' => 'CmsController@edit'));
    Route::post('/cms/update', 					array('as' => 'cms_update',             'uses' => 'CmsController@update'));
    Route::get('/cms/destroy/{id}', 			array('as' => 'cms_destroy',            'uses' => 'CmsController@destroy'));
    
    //providers
    Route::any('/providers', 	                 array('as' => 'adm_providers',	            'uses' => 'ProvidersController@index'));
    Route::get('/provider/create', 	             array('as' => 'adm_provider_create',	    'uses' => 'ProvidersController@create'));
    Route::post('/provider/create', 	         array('as' => 'adm_provider_create',	    'uses' => 'ProvidersController@store'));
    Route::get('/provider/edit/{id}', 	         array('as' => 'adm_provider_edit',	        'uses' => 'ProvidersController@edit'));
    Route::post('/provider/edit/{id}', 	         array('as' => 'adm_provider_edit',	        'uses' => 'ProvidersController@update'));
    Route::get('/provider/details/{id}', 	     array('as' => 'adm_provider_view',	        'uses' => 'ProvidersController@show'));
    Route::get('/provider/delete/{id}', 	     array('as' => 'adm_provider_delete',	    'uses' => 'ProvidersController@destroy'));
    
    //Clinic
    Route::any('/excercises', 	                 array('as' => 'adm_excercises',	            'uses' => 'ExcerciseController@index'));
    Route::get('/excercise/create', 	         array('as' => 'adm_excercise_create',	        'uses' => 'ExcerciseController@create'));
    Route::post('/excercise/create', 	         array('as' => 'adm_excercise_create',	        'uses' => 'ExcerciseController@store'));
    Route::get('/excercise/edit/{id}', 	         array('as' => 'adm_excercise_edit',	            'uses' => 'ExcerciseController@edit'));
    Route::post('/excercise/edit/{id}', 	     array('as' => 'adm_excercise_edit',            'uses' => 'ExcerciseController@update'));
    Route::get('/excercise/details/{id}', 	     array('as' => 'adm_excercise_view',	        'uses' => 'ExcerciseController@show'));
    Route::get('/excercise/delete/{id}', 	     array('as' => 'adm_excercise_delete',          'uses' => 'ExcerciseController@destroy'));
    
    //Clinician    
    Route::any('/clinicians', 	                 array('as' => 'adm_clinicians',	            'uses' => 'CliniciansController@index'));
    Route::get('/clinician/create', 	         array('as' => 'adm_clinician_create',	        'uses' => 'CliniciansController@create'));
    Route::post('/clinician/create', 	         array('as' => 'adm_clinician_create',	        'uses' => 'CliniciansController@store'));
    Route::get('/clinician/edit/{id}', 	         array('as' => 'adm_clinician_edit',	        'uses' => 'CliniciansController@edit'));
    Route::post('/clinician/edit/{id}', 	     array('as' => 'adm_clinician_edit',	        'uses' => 'CliniciansController@update'));
    Route::get('/clinician/details/{id}', 	     array('as' => 'adm_clinician_view',	        'uses' => 'CliniciansController@show'));
    Route::get('/clinician/delete/{id}', 	     array('as' => 'adm_clinician_delete',	        'uses' => 'CliniciansController@destroy'));
    
    //Clinic
    Route::any('/clinics', 	                 array('as' => 'adm_clinics',	                'uses' => 'ClinicsController@index'));
    Route::get('/clinic/create', 	         array('as' => 'adm_clinic_create',	            'uses' => 'ClinicsController@create'));
    Route::post('/clinic/create', 	         array('as' => 'adm_clinic_create',	            'uses' => 'ClinicsController@store'));
    Route::get('/clinic/edit/{id}', 	     array('as' => 'adm_clinic_edit',	            'uses' => 'ClinicsController@edit'));
    Route::post('/clinic/edit/{id}', 	     array('as' => 'adm_clinic_edit',	            'uses' => 'ClinicsController@update'));
    Route::get('/clinic/details/{id}', 	     array('as' => 'adm_clinic_view',	            'uses' => 'ClinicsController@show'));
    Route::get('/clinic/delete/{id}', 	     array('as' => 'adm_clinic_delete',	            'uses' => 'ClinicsController@destroy'));
    
    //Site Usage
    Route::any('/usages', 	                 array('as' => 'adm_usages',	                'uses' => 'UsageController@index'));
});

