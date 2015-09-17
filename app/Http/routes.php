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

/*Route::get('/',function() {
    if(Auth::check())
        return view('search.seek');
    return view('auth.login');
});*/

Route::get('/', 'SearchController@index');
Route::get('home', 'SearchController@index');
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

/* LOGIN WITH FB ROUTE */
Route::get('loginwithfb','AuthFbController@login');
Route::get('loginwithgoogle','AuthGoogleController@login');


/* SUGGESTION ROUTE -> Muestra todas las sugerencias hechas por un usuario */
Route::get('suggestions',[
    'as' => 'suggestions_path',
    'uses' => 'SuggestionController@index'
]);

/* SUGGESTION ROUTE -> Muestra la forma para crear una sugerencia */
Route::get('suggestions/create',[
    'as' => 'suggestions_path',
    'uses' => 'SuggestionController@create'
]);

/* SUGGESTION ROUTE -> Guarda la nueva sugerencia */
Route::post('suggestions',[
    'as'    => 'suggestions_path',
    'uses'  => 'SuggestionController@store'
]);

/* SUGGESTION ROUTE -> Muestra la sugerencia */
Route::get('suggestions/{id}',[
    'as'    => 'suggestions_path',
    'uses'  => 'SuggestionController@show'
]);

/* SUGGESTION ROUTE -> Muestra la forma para actualizar la sugerencia */
Route::get('suggestions/{id}/edit',[
    'as'    => 'suggestions_path',
    'uses'  =>  'SuggestionController@edit'
]);

/* SUGGESTION ROUTE -> Actualiza la sugerencia */
Route::patch('suggestions/{id}',[
    'as'    => 'suggestions_path',
    'uses'  =>  'SuggestionController@update'
]);

/* SEARCH ROUTE -> Muestra la forma para una busqueda específica */
Route::get('search',[
    'as' => 'search_path',
    'uses' => 'SearchController@index'
]);

/* SEARCH ROUTE -> Muestra la forma para una busqueda específica */
Route::get('search_general',[
    'as' => 'search_path',
    'uses' => 'SearchController@general'
]);

/* SEARCH ROUTE -> Muestra las sugenrencias que hacen match con la forma */
Route::get('results',[
    'as' => 'results_path',
    'uses' => 'SearchController@results'
]);

Route::get('general_results',[
    'as' => 'results_path',
    'uses' => 'SearchController@general_results'
]);

/* SEARCH ROUTE -> Muestra la sugerencia en base a un id */
Route::get('results/{id}',[
    'as' => 'results_path',
    'uses' => 'SearchController@show'
]);

/* PROFILE ROUTE -> Muestra el perfil del usuario loggeado*/
Route::get('profile',[
    'as' => 'profile_path',
    'uses' => 'ProfileController@index'
]);

/* PROFILE ROUTE -> Muestra el perfil de un usuario en específico y sus sugerencias */
Route::get('profile/{id}',[
    'as' => 'profile_path',
    'uses' => 'ProfileController@show'
]);

/* PROFILE ROUTE -> Muestra la forma para editar la información del usuario loggeado */
Route::get('profile/{id}/edit',[
    'as' => 'profile_path',
    'uses' => 'ProfileController@edit'
]);

/* PROFILE ROUTE -> Actualiza la información del usuario loggeado */
Route::patch('profile/{id}',[
    'as'    => 'profile_path',
    'uses'  =>  'ProfileController@update'
]);
/* PLAN ROUTE -> Muestra todas las sugerencias que un usuario agregado a su plan */
Route::get('plan',[
    'as' => 'plan_path',
    'uses' => 'PlanController@index'
]);
/* PLAN ROUTE -> Agrega una sugerencias  al plan de un usuario */
Route::post('plan',[
    'as' => 'plan_path',
    'uses' => 'PlanController@store'
]);

/* PLAN ROUTE -> Muestra una sugerencia específica agregada al plan del usuario */
Route::get('plan/{id}',[
    'as'    => 'plan_path',
    'uses'  => 'PlanController@show'
]);

/* PLAN ROUTE -> Elimina una sugerencia que tienes en el plan */
Route::delete('plan/{id}',[
    'as' => 'plan_path',
    'uses' => 'PlanController@destroy'
]);


/* COMMENT ROUTE -> Guarda el comentario hecho a una sugerencia */
Route::post('comments/{id}',[
    'as'    => 'comment_path',
    'uses'  => 'CommentController@store'
]);


Route::get('test',[
    'as' => 'test_path',
    'uses' => 'TestController@index'
]);

/* AJAX FOR DROPDOWN MENUS -> Trae información de grados según el nivel */
/* FOR HOME */
Route::get('ajax_grades',[
    'as' => 'ajax_grade_path',
    'uses' => 'AjaxController@getGrades'
]);
Route::get('ajax_subjects',[
    'as' => 'ajax_subject_path',
    'uses' => 'AjaxController@getSubjects'
]);
Route::get('ajax_topics',[
    'as' => 'ajax_topic_path',
    'uses' => 'AjaxController@getTopics'
]);
/* FOR HOME END */

/* FOR CREATE */
Route::get('suggestions/create/ajax_grades',[
    'as' => 'ajax_grade_path',
    'uses' => 'AjaxController@getGrades'
]);
Route::get('suggestions/create/ajax_subjects',[
    'as' => 'ajax_subject_path',
    'uses' => 'AjaxController@getSubjects'
]);
Route::get('suggestions/create/ajax_topics',[
    'as' => 'ajax_topic_path',
    'uses' => 'AjaxController@getTopics'
]);
/* FOR CREATE END */
/* FOR EDIT */
Route::get('suggestions/{id}/edit/ajax_grades',[
    'as' => 'ajax_grade_path',
    'uses' => 'AjaxController@getGrades'
]);
Route::get('suggestions/{id}/edit/ajax_subjects',[
    'as' => 'ajax_subject_path',
    'uses' => 'AjaxController@getSubjects'
]);
Route::get('suggestions/{id}/edit/ajax_topics',[
    'as' => 'ajax_topic_path',
    'uses' => 'AjaxController@getTopics'
]);
/* FOR EDIT END */


/* AJAX FOR SCRAP LINKS -> Trae información de URL (title, descripción e imagen) */
/* FOR CREATE */
Route::get('suggestions/create/ajax_scrap_app',[
    'as' => 'ajax_scrap_app_path',
    'uses' => 'AjaxController@getAppOpenGraph'
]);
Route::get('suggestions/create/ajax_scrap_ebook',[
    'as' => 'ajax_scrap_ebook_path',
    'uses' => 'AjaxController@getEbookOpenGraph'
]);
Route::get('suggestions/create/ajax_scrap_video',[
    'as' => 'ajax_scrap_video_path',
    'uses' => 'AjaxController@getVideoOpenGraph'
]);
/* FOR CREATE END */

/* FOR EDIT */
Route::get('suggestions/{id}/edit/ajax_scrap_app',[
    'as' => 'ajax_scrap_app_path',
    'uses' => 'AjaxController@getAppOpenGraph'
]);
Route::get('suggestions/{id}/edit/ajax_scrap_ebook',[
    'as' => 'ajax_scrap_ebook_path',
    'uses' => 'AjaxController@getEbookOpenGraph'
]);
Route::get('suggestions/{id}/edit/ajax_scrap_video',[
    'as' => 'ajax_scrap_video_path',
    'uses' => 'AjaxController@getVideoOpenGraph'
]);
/* FOR EDIT END */


