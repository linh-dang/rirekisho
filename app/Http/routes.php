<?php
Route::controllers([
    'auth' => '\App\Http\Controllers\Auth\AuthController',
    'password' => '\App\Http\Controllers\Auth\PasswordController',
]);
Route::group(['middleware' => ['auth']], function () {
    //every one can see
    Route::get('/', function () {
        return view('about');
    });
    Route::get('about', function () {
        return view('about');
    });

    //every one see different page  
    Route::get('CV/{id}', 'CVController@show')->where('id', '[0-9]+');
    Route::get('CV/{id}/view', 'CVController@show2');
    Route::get('Record/index/{type}', 'RecordController@index');
    Route::put('User/{id}', 'UsersController@update');
    Route::get('User/{id}', 'UsersController@show')->where('id', '[0-9]+');

    //admin only
    Route::get('User/search', 'UsersController@search');
    Route::get('User', 'UsersController@index');
    Route::resource('Record', 'RecordController');
    Route::resource('Skill', 'SkillController');
});
Route::group(['middleware' => ['auth', 'App\Http\Middleware\ApplicantMiddleware']], function () {
    Route::get('CV/{id}/edit2', 'CVController@edit2');
    Route::resource('CV', 'CVController', ['except' => ['index', 'destroy', 'show']]);
});
Route::group(['middleware' => ['auth', 'App\Http\Middleware\VisitorMiddleware']], function () {
    Route::get('CV/search', 'CVController@search');
    Route::get('CV', 'CVController@index');
    Route::get('CV/{id}/getPDF', 'CVController@getPDF');

});
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@myLogout');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
