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

Route::get('/', function () {
    //send data from route to view (not use it normally)
    //return view('welcome')->with('data',3);
    //send multi variables
    //return view('welcome')->with(['name'=>'yousi dh','age'=>24]);
//    $obj = new \stdClass();
//    $obj ->name='yousif';
//    $obj ->major='cs';
//    return view('welcome')->with(compact('obj') );
    //best use

    $data =array();
    $data['first_name']='Yousif';
    $data['last_name']='dahabra';
    //we send data from controller not here this is just study case
    $data2=array();
    $data2[]='Yousif';
    $data2[]='dahabra';

    return view('welcome',compact('data2'))->with($data);

});

Route::get('/test', function () {
    return "welcome";
});
// In this Route  {id} is required parameters
Route::get('/test2/{id}', function ($id) {
    return "Your ID is: ".$id;
});
// In this Route  {name} is optional parameters because we add '?' after parameter
Route::get('/test3/{name?}', function ($user='') {
    return "Your name is: ".$user;
});
// In this Route we shortcut a long url to short url in tag <a> with this function route('name of route','if we have parameters we set it in second arguments here')
Route::get('/this-is-a-long-url-name/{url}', function ($link='') {
    return "Your link is: ".$link;
})->name('short_link');

//we specify just use any controller in 'Front' folder to be more easy control a files in folder
//like is we have 20 Route::get('Front/users','---'); we must add Front for all our route but in this case we just add name
/*Route::namespace('Front')->group(function (){

    Route::get('users','UserController@showUserNames');

});

//The prefix method may be used to prefix each route in the group with a given URI.
// For example, you may want to prefix all route URIs within the group with users:
Route::prefix('users')->group(function (){

    Route::get('/',function (){
        return 'Hello';
    });
    Route::get('show','UserController@showUserNames');
    // Matches The "/users/show" URL
    Route::delete('delete','UserController@showUserNames');
    // Matches The "/users/delete" URL
    Route::get('edit','UserController@showUserNames');
    Route::put('update','UserController@showUserNames');

});*/
/*
 * this same as above
Route::group(['prefix'=>'users'],function (){

    Route::get('show','UserController@showUserNames');
    // Matches The "/users/show" URL
    Route::delete('delete','UserController@showUserNames');
    // Matches The "/users/delete" URL
    Route::get('edit','UserController@showUserNames');
    Route::put('update','UserController@showUserNames');

});

//middleware is control if you can visit this link or not
// ex: if you have page must log in to see it the middleware can check if you are login give you access
// otherwise will redistrict you to login page
Route::get('check',function (){
return 'middleware';
})->middleware('auth');
// other way is*/
/*
 * this same as above
Route::group(['prefix'=>'users','middleware'=> 'auth'],function (){

});
*/
Route::get('getAdminText','Admin\SecoundController@getText')->middleware('verified');
//OR
/*Route::group(['namespace'=>'Admin'],function (){
    Route::get('getAdminText','SecoundController@getText');
    Route::get('getAdminText2','SecoundController@getText2');
    Route::get('getAdminText3','SecoundController@getText3');
});
*/
// resource method like a set of package that have many function to help you post/get/delete
// with resource controller php artisan make:controller NewsController --resource
// for example if you have news you will add/update/delete/view and make a link . resource method do it for us
//Route::resource('news','NewsController');
//Route::get('index','Front\UserController@showIndex');
Route::get('/home', function () {
    return view('home');
});
Route::get('/blog', function () {
    return view('blog');
});

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');

