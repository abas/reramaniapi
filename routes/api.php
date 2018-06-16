<?php

use Illuminate\Http\Request;

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



// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix'=>'v1'],function(){
    Route::get('/','Api\RamaniController@ping');

    // Route::group(['prefix'=>'auth'],function(){
    //     Route::post('/register','Api\RamaniController@register');
    //     Route::post('/login','Api\RamaniController@login');
    // });

    Route::group(['prefix'=>'get'],function(){
        Route::get('listmarker','Api\MarkerController@listMarker')->name('listmarker');
    });

    Route::group(['prefix'=>'post'],function(){
        Route::post('addmarker','Api\MarkerController@addMarker')->name('addmarker');
        Route::post('markerid','Api\MarkerController@markerID')->name('markerid');
    });

    Route::group(['prefix'=>'put'],function(){
        Route::put('deletemarker','Api\MarkerController@deleteMarker')->name('deletemarker');
        Route::put('updatemarker/{id}','Api\MarkerController@updateMarker')->name('updatemarker');    
    });
});
