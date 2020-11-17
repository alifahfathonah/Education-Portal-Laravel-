<?php


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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::namespace('Frontend')->group(function (){
    Route::get('/','HomeController@index')->name('user.home');
//    Route::get('/information','HomeController@information')->name('user.information');
    //Skill Retrieve
    Route::get('/soft-skill','HomeController@softSkill')->name('user.skill.softskill');
    Route::get('/soft-skill/{slug}','HomeController@softSkillDetails')->name('user.skill.softskill.details');
    Route::get('/academic-skill','HomeController@academicSkill')->name('user.skill.academicskill');
    Route::get('/professional-skill','HomeController@professionalSkill')->name('user.skill.professionalskill');
});













//Admin Route
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/','HomeController@index')->name('admin.mainpage')->middleware('auth:admin');
    Route::get('/home', 'HomeController@index')->name('admin.home')->middleware('auth:admin');
    //For Skill Development
    Route::prefix('skill')->group(function (){
        Route::get('index','SkillController@index')->name('admin.skill.index');
        Route::get('create','SkillController@create')->name('admin.skill.create');
        Route::post('store','SkillController@store')->name('admin.skill.store');
        Route::get('delete/{id}','SkillController@delete')->name('admin.skill.delete');
        Route::get('{id}/edit','SkillController@edit')->name('admin.skill.edit');
        Route::put('{id}/update','SkillController@update')->name('admin.skill.update');
        Route::get('/trash','SkillController@trashIndex')->name('admin.skill.trash.index');
        Route::get('{id}/restore','SkillController@restore')->name('admin.skill.trash.restore');
        Route::get('{id}/forcedelete','SkillController@trashDelete')->name('admin.skill.trash.delete');
    });

    //Admin Login
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\LoginController@login');
    Route::post('/logout', 'Auth\LoginController@logout')->name('admin.logout');

});

