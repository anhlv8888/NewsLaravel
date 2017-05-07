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

Route::get('/','PageController@home');
/*
  Category--Client
*/
Route::get('{idCate}/{category}/{idPt}/{posttype}.html','PageController@posttype');
Route::get('/{idCate}/{category}.html','PageController@category');
// End Category

// article- detail
Route::get('{idArt}/{article}.htm','PageController@article');
Route::post('comment/{idArt}','CommentController@postCommentArticle')->name('comment');
//end article-detail


// login client
Route::get('loginClient','PageController@getloginClient');
Route::get('logoutClient','PageController@getlogoutClient');
Route::post('loginClient','PageController@postloginClient')->name('client.login');
Route::post('registerClient','PageController@postRegisterClient')->name('client.register');
// End Login Client ...

// Edit User Client
Route::get('userClient/{idUser}','PageController@getUserClient');
Route::post('userClient/{idUser}','PageController@postUserClient')->name('client.user');
//End Edit user Client


// Search infor Client
Route::post('search','PageController@postSearch');
//End Search


// Login Admin
Route::get('admin/login','UserController@getloginAdmin');
Route::post('admin/login','UserController@postloginAdmin')->name('admin.login');
Route::get('admin/logout','UserController@getlogout');
// End Login Admin

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function (){
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
    Route::group(['prefix'=>'article'],function (){
        Route::get('table','ArticleController@table')->name('article.table');
        Route::get('create','ArticleController@getcreate');
        Route::post('create','ArticleController@postcreate')->name('article.create');
        Route::get('update/{id}','ArticleController@getupdate');
        Route::post('update/{id}','ArticleController@postupdate')->name('article.update');
        Route::get('delete/{id}','ArticleController@destroy');
    });
    Route::group(['prefix'=>'comment'],function (){
        Route::get('delete/{id}/{idArticle}','CommentController@destroy');
    });
    Route::group(['prefix'=>'slide'],function (){
        Route::get('table','SlideController@table')->name('slide.table');
        Route::get('create','SlideController@getcreate');
        Route::post('create','SlideController@postcreate')->name('slide.create');
        Route::get('update/{id}','SlideController@getupdate');
        Route::post('update/{id}','SlideController@postupdate')->name('slide.update');
        Route::get('delete/{id}','SlideController@destroy');
    });
    Route::group(['prefix'=>'user'],function (){
        Route::get('table','UserController@table')->name('user.table');
        Route::get('create','UserController@getcreate');
        Route::post('create','UserController@postcreate')->name('user.create');
        Route::get('update/{id}','UserController@getupdate');
        Route::post('update/{id}','UserController@postupdate')->name('user.update');
        Route::get('delete/{id}','UserController@destroy' );
    });
    Route::group(['prefix'=>'ajax'],function (){
        Route::get('posttype/{idCategory}','AjaxController@getPostType')->name('ajax.posttype');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index');
