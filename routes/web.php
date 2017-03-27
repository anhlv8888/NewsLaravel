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
    return view('welcome');
});
Route::get('/demo',function (){

    $theloai = Theloai::find(1);
     foreach ( $theloai->loaitin as  $loaitin){
         echo $loaitin->Ten . "<br>";
     }

});
Route::group(['prefix'=>'admin'],function (){
    Route::group(['prefix'=>'category'],function (){
        Route::get('table','CategoryController@table')->name('category.table');
        Route::get('create','CategoryController@getcreate');
        Route::post('create','CategoryController@postcreate')->name('category.create');
        Route::get('update/{id}','CategoryController@getupdate');
        Route::post('update/{id}','CategoryController@postupdate')->name('category.update');
        Route::get('delete/{id}','CategoryController@destroy');
    });
    Route::group(['prefix'=>'posttype'],function (){
        Route::get('table','PostTypeController@table')->name('posttype.table');
        Route::get('create','PostTypeController@getcreate');
        Route::post('create','PostTypeController@postcreate')->name('posttype.create');
        Route::get('update/{id}','PostTypeController@getupdate');
        Route::post('update/{id}','PostTypeController@postupdate')->name('posttype.update');
        Route::get('delete/{id}','PostTypeController@destroy');
    });
});