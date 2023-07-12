<?php

use App\Events\FormSubmitted;

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
Route::group(['middleware' => ['auth']], function() {

    Route::get('/hms', function () {
        return view('backend.pages.dashboard');
    });

    // Dynamic Routes
    Route::group(['prefix' => 'hms'], function() {
        Route::get         ('/{app_type}/{app}/{module}',       'Controller@index'                                              )->name('app');
        Route::get         ('/{app_type}/{app}',                'Controller@direct_app'                                         )->name('direct_app');
    });

    // Controller action
    Route::group(['prefix' => 'actions'], function() {
        Route::group(['prefix' => 'app_type'], function() {
            Route::get          ('/get',                            'AppTypeController@get'                                         )->name('get');
            Route::post         ('/save',                           'AppTypeController@store'                                       )->name('save');
            Route::get          ('/edit/{id}',                      'AppTypeController@edit'                                        )->name('edit');
            Route::post         ('/update/{id}',                    'AppTypeController@update'                                      )->name('update');
            Route::post         ('/destroy',                        'AppTypeController@destroy'                                     )->name('delete');
            Route::get          ('/list/{id}',                      'AppTypeController@get_list'                                    )->name('list');
        });

        Route::group(['prefix' => 'app'], function() {
            Route::get          ('/get',                            'AppController@get'                                             )->name('get');
            Route::post         ('/save',                           'AppController@store'                                           )->name('save');
            Route::get          ('/edit/{id}',                      'AppController@edit'                                            )->name('edit');
            Route::post         ('/update/{id}',                    'AppController@update'                                          )->name('update');
            Route::post         ('/destroy',                        'AppController@destroy'                                         )->name('delete');
            Route::get          ('/list/{id}',                      'AppController@get_list'                                        )->name('list');
        });

        Route::group(['prefix' => 'app_module'], function() {
            Route::get          ('/get',                            'AppModuleController@get'                                       )->name('get');
            Route::post         ('/save',                           'AppModuleController@store'                                     )->name('save');
            Route::get          ('/edit/{id}',                      'AppModuleController@edit'                                      )->name('edit');
            Route::post         ('/update/{id}',                    'AppModuleController@update'                                    )->name('update');
            Route::post         ('/destroy',                        'AppModuleController@destroy'                                   )->name('delete');
            Route::get          ('/list/{id}',                      'AppModuleController@get_list'                                  )->name('list');
        });
        
        Route::group(['prefix' => 'user'], function() {
            Route::get          ('/get',                            'UserController@get'                                            )->name('get');
            Route::post         ('/save',                           'UserController@store'                                          )->name('save');
            Route::get          ('/edit/{id}',                      'UserController@edit'                                           )->name('edit');
            Route::post         ('/update/{id}',                    'UserController@update'                                         )->name('update');
            Route::post         ('/destroy',                        'UserController@destroy'                                        )->name('delete');
            Route::get          ('/list/{id}',                      'UserController@get_list'                                       )->name('list');
        });
        
        Route::group(['prefix' => 'role'], function() {
            Route::get          ('/get',                            'RoleController@get'                                            )->name('get');
            Route::post         ('/save',                           'RoleController@store'                                          )->name('save');
            Route::get          ('/edit/{id}',                      'RoleController@edit'                                           )->name('edit');
            Route::post         ('/update/{id}',                    'RoleController@update'                                         )->name('update');
            Route::post         ('/destroy',                        'RoleController@destroy'                                        )->name('delete');
            Route::get          ('/list/{id}',                      'RoleController@get_list'                                       )->name('list');
        });

        Route::group(['prefix' => 'role'], function() {
            Route::get          ('/get',                            'RoleController@get'                                            )->name('get');
            Route::post         ('/save',                           'RoleController@store'                                          )->name('save');
            Route::get          ('/edit/{id}',                      'RoleController@edit'                                           )->name('edit');
            Route::post         ('/update/{id}',                    'RoleController@update'                                         )->name('update');
            Route::post         ('/destroy',                        'RoleController@destroy'                                        )->name('delete');
            Route::get          ('/list/{id}',                      'RoleController@get_list'                                       )->name('list');
        });
        
        Route::group(['prefix' => 'building'], function() {
            Route::get          ('/get',                            'BuildingController@get'                                        )->name('get');
            Route::post         ('/save',                           'BuildingController@store'                                      )->name('save');
            Route::get          ('/edit/{id}',                      'BuildingController@edit'                                       )->name('edit');
            Route::post         ('/update/{id}',                    'BuildingController@update'                                     )->name('update');
            Route::post         ('/destroy',                        'BuildingController@destroy'                                    )->name('delete');
        });
        
        Route::group(['prefix' => 'floor'], function() {
            Route::get          ('/get/{id}',                       'FloorController@get'                                           )->name('get');
            Route::post         ('/save',                           'FloorController@store'                                         )->name('save');
            Route::get          ('/edit/{id}',                      'FloorController@edit'                                          )->name('edit');
            Route::post         ('/update/{id}',                    'FloorController@update'                                        )->name('update');
            Route::post         ('/destroy',                        'FloorController@destroy'                                       )->name('delete');
            Route::get          ('/list/{id}',                      'FloorController@get_list'                                      )->name('list');
        });

        Route::group(['prefix' => 'room'], function() {
            Route::get          ('/get/{id}',                       'RoomController@get'                                            )->name('get');
            Route::post         ('/save',                           'RoomController@store'                                          )->name('save');
            Route::get          ('/edit/{id}',                      'RoomController@edit'                                           )->name('edit');
            Route::post         ('/update/{id}',                    'RoomController@update'                                         )->name('update');
            Route::post         ('/destroy',                        'RoomController@destroy'                                        )->name('delete');
            Route::get          ('/list/{id}',                      'RoomController@get_list'                                       )->name('list');
        });
        
        Route::group(['prefix' => 'bed'], function() {
            Route::get          ('/get/{id}',                       'BedController@get'                                             )->name('get');
            Route::post         ('/save',                           'BedController@store'                                           )->name('save');
            Route::get          ('/edit/{id}',                      'BedController@edit'                                            )->name('edit');
            Route::post         ('/update/{id}',                    'BedController@update'                                          )->name('update');
            Route::post         ('/destroy',                        'BedController@destroy'                                         )->name('delete');
            Route::get          ('/list/{id}',                      'BedController@get_list'                                        )->name('list');
        });

        //Patient Management

        Route::group(['prefix' => 'patient'], function() {
            Route::get          ('/get',                            'PatientController@get'                                         )->name('get');
            Route::post         ('/save',                           'PatientController@store'                                       )->name('save');
            Route::get          ('/edit/{id}',                      'PatientController@edit'                                        )->name('edit');
            Route::post         ('/update/{id}',                    'PatientController@update'                                      )->name('update');
            Route::post         ('/destroy',                        'PatientController@destroy'                                     )->name('delete');
        });

        Route::group(['prefix' => 'patient_insurance'], function() {
            Route::get          ('/get/{id}',                       'PatientInsuranceController@get'                                )->name('get');
            Route::post         ('/save',                           'PatientInsuranceController@store'                              )->name('save');
            Route::get          ('/edit/{id}',                      'PatientInsuranceController@edit'                               )->name('edit');
            Route::post         ('/update/{id}',                    'PatientInsuranceController@update'                             )->name('update');
            Route::post         ('/destroy',                        'PatientInsuranceController@destroy'                            )->name('delete');
        });

        Route::group(['prefix' => 'family_information'], function() {
            Route::get          ('/get/{id}',                       'FamilyInformationController@get'                               )->name('get');
            Route::post         ('/save',                           'FamilyInformationController@store'                             )->name('save');
            Route::get          ('/edit/{id}',                      'FamilyInformationController@edit'                              )->name('edit');
            Route::post         ('/update/{id}',                    'FamilyInformationController@update'                            )->name('update');
            Route::post         ('/destroy',                        'FamilyInformationController@destroy'                           )->name('delete');
        });

        Route::group(['prefix' => 'medical_cases'], function() {
            Route::get          ('/get/{id}',                       'MedicalCaseController@get'                                     )->name('get');
            Route::post         ('/save',                           'MedicalCaseController@store'                                   )->name('save');
            Route::get          ('/edit/{id}',                      'MedicalCaseController@edit'                                    )->name('edit');
            Route::post         ('/update/{id}',                    'MedicalCaseController@update'                                  )->name('update');
            Route::post         ('/destroy',                        'MedicalCaseController@destroy'                                 )->name('delete');
        });

        Route::group(['prefix' => 'medicine_taken'], function() {
            Route::get          ('/get/{id}',                       'MedicineTakenController@get'                                   )->name('get');
            Route::post         ('/save',                           'MedicineTakenController@store'                                 )->name('save');
            Route::get          ('/edit/{id}',                      'MedicineTakenController@edit'                                  )->name('edit');
            Route::post         ('/update/{id}',                    'MedicineTakenController@update'                                )->name('update');
            Route::post         ('/destroy',                        'MedicineTakenController@destroy'                               )->name('delete');
        });

        Route::group(['prefix' => 'patient_allergies'], function() {
            Route::get          ('/get/{id}',                       'PatientAllergiesController@get'                                )->name('get');
            Route::post         ('/save',                           'PatientAllergiesController@store'                              )->name('save');
            Route::get          ('/edit/{id}',                      'PatientAllergiesController@edit'                               )->name('edit');
            Route::post         ('/update/{id}',                    'PatientAllergiesController@update'                             )->name('update');
            Route::post         ('/destroy',                        'PatientAllergiesController@destroy'                            )->name('delete');
        });

        Route::group(['prefix' => 'procedures_undertaken'], function() {
            Route::get          ('/get/{id}',                       'ProceduresUndertakenController@get'                            )->name('get');
            Route::post         ('/save',                           'ProceduresUndertakenController@store'                          )->name('save');
            Route::get          ('/edit/{id}',                      'ProceduresUndertakenController@edit'                           )->name('edit');
            Route::post         ('/update/{id}',                    'ProceduresUndertakenController@update'                         )->name('update');
            Route::post         ('/destroy',                        'ProceduresUndertakenController@destroy'                        )->name('delete');
        });

        Route::group(['prefix' => 'progress_consultation'], function() {
            Route::get          ('/get/{id}',                       'ProgressConsultationController@get'                            )->name('get');
            Route::post         ('/save',                           'ProgressConsultationController@store'                          )->name('save');
            Route::get          ('/edit/{id}',                      'ProgressConsultationController@edit'                           )->name('edit');
            Route::post         ('/update/{id}',                    'ProgressConsultationController@update'                         )->name('update');
            Route::post         ('/destroy',                        'ProgressConsultationController@destroy'                        )->name('delete');
        });

        Route::group(['prefix' => 'vital_measurement'], function() {
            Route::get          ('/get/{id}',                       'VitalMeasurementController@get'                                )->name('get');
            Route::post         ('/save',                           'VitalMeasurementController@store'                              )->name('save');
            Route::get          ('/edit/{id}',                      'VitalMeasurementController@edit'                               )->name('edit');
            Route::post         ('/update/{id}',                    'VitalMeasurementController@update'                             )->name('update');
            Route::post         ('/destroy',                        'VitalMeasurementController@destroy'                            )->name('delete');
        });

        Route::group(['prefix' => 'family_medical_history'], function() {
            Route::get          ('/get/{id}',                       'FamilyMedicalHistoryController@get'                            )->name('get');
            Route::post         ('/save',                           'FamilyMedicalHistoryController@store'                          )->name('save');
            Route::get          ('/edit/{id}',                      'FamilyMedicalHistoryController@edit'                           )->name('edit');
            Route::post         ('/update/{id}',                    'FamilyMedicalHistoryController@update'                         )->name('update');
            Route::post         ('/destroy',                        'FamilyMedicalHistoryController@destroy'                        )->name('delete');
        });

        Route::group(['prefix' => 'social_history'], function() {
            Route::get          ('/get/{id}',                       'SocialHistoryController@get'                                   )->name('get');
            Route::post         ('/save',                           'SocialHistoryController@store'                                 )->name('save');
            Route::get          ('/edit/{id}',                      'SocialHistoryController@edit'                                  )->name('edit');
            Route::post         ('/update/{id}',                    'SocialHistoryController@update'                                )->name('update');
            Route::post         ('/destroy',                        'SocialHistoryController@destroy'                               )->name('delete');
        });
        
        Route::group(['prefix' => 'other_information'], function() {
            Route::get          ('/get/{id}',                       'PatientOtherInformationController@get'                         )->name('get');
            Route::post         ('/save',                           'PatientOtherInformationController@store'                       )->name('save');
            Route::get          ('/edit/{id}',                      'PatientOtherInformationController@edit'                        )->name('edit');
            Route::post         ('/update/{id}',                    'PatientOtherInformationController@update'                      )->name('update');
            Route::post         ('/destroy',                        'PatientOtherInformationController@destroy'                     )->name('delete');
        });

        //End Patient Management

        //Doctor Management

        Route::group(['prefix' => 'doctor'], function() {
            Route::get          ('/get',                            'DoctorController@get'                                         )->name('get');
            Route::post         ('/save',                           'DoctorController@store'                                       )->name('save');
            Route::get          ('/edit/{id}',                      'DoctorController@edit'                                        )->name('edit');
            Route::post         ('/update/{id}',                    'DoctorController@update'                                      )->name('update');
            Route::post         ('/destroy',                        'DoctorController@destroy'                                     )->name('delete');
        });

        //End Doctor Management


        Route::group(['prefix' => 'department'], function() {
            Route::get          ('/get',                            'DepartmentController@get'                                     )->name('get');
            Route::post         ('/save',                           'DepartmentController@store'                                   )->name('save');
            Route::get          ('/edit/{id}',                      'DepartmentController@edit'                                    )->name('edit');
            Route::post         ('/update/{id}',                    'DepartmentController@update'                                  )->name('update');
            Route::post         ('/destroy',                        'DepartmentController@destroy'                                 )->name('delete');
        });



        Route::group(['prefix' => 'activity_log'], function() {
            Route::get          ('/get',                     'Controller@log_get'                                                   )->name('get');
        });
        
        Route::group(['prefix' => 'access'], function() {
            Route::get          ('/get_apps/{id}',                  'AccessController@get_apps'                                     )->name('get');
            Route::get          ('/get/{role_id}',                  'AccessController@get_access'                                   )->name('get');
            Route::post         ('/save',                           'AccessController@store'                                        )->name('save');
            Route::post         ('/get_permission',                 'Controller@getPermissionAccess'                                )->name('get');
        });
        
        Route::group(['prefix' => 'role_setup'], function() {
            Route::post         ('/save',                           'RoleSetupController@store'                                     )->name('save');
            Route::get          ('/list/{id}',                      'RoleSetupController@get_list'                                  )->name('list');
        });

    });


});

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
