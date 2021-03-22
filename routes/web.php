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

Route::get('/index', function () {
    return view('welcome');
});
/*
Route::get('/user/{id}', function ($id) {
    return "number user :".$id;
})->name("info_user");


Route::namespace("front")->group(function(){

    Route::get('users','UserController@showNameUsers');
    Route::get('age','UserController@showageUsers')->name("age");


});

*/
/*Route::group(['prefix'=>'users','middleware'=>'auth'],function(){

    Route::get('/',function (){
        return 'work';

    });
    Route::get('show','UserController@showNameUsers');
    Route::delete('delete','UserController@showageUsers');
    Route::put('update','UserController@showNameUsers');
    Route::get('edit','UserController@showNameUsers');

});
*/
Route::group(['namespace'=>'admin'],function(){

    Route::get('second', 'SecondController@info');
    Route::get('second1', 'SecondController@info1');
    Route::get('second2', 'SecondController@info2');

});

Route::get('login',function(){
    return 'you must login to access this route';
})->name('login');

Route::resource('news','NewsController'); //cette ligne remplace toutes les routes ci-dessous (resource)

/*Route::get('news','NewsController@index');
Route::get('news/{id}','NewsController@show');
Route::get('news/{id}/edit','NewsController@edit');
Route::get('news/{id}','NewsController@update');
Route::get('news/{id}','NewsController@delete');
*/
Route::get('/index','UserController@showInfo');


Route::get('/landling', function () {
    return view('landling');
});

Route::get('/about',function (){
    return view('about');

});

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/',function (){
   return'Home Page';
});


Route::get('/redirect/{service}', 'SocialController@redirect');
Route::get('/callback/{service}', 'SocialController@callback');
Route::get('/fillable','CrudController@get_offers');


Route::group(['prefix'=> LaravelLocalization::setLocale(),'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'] ],function (){

 Route::group(['prefix'=>'offers'],function (){


    Route::get('/create','CrudController@create');
    Route::post('/ajouter','CrudController@store')->name('offers.store');

    });
   

});
