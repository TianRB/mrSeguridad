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

/*
|--------------------------------------------------------------------------
| Laravel
|--------------------------------------------------------------------------
*/
Auth::routes();

/*
|--------------------------------------------------------------------------
| Frontend
|--------------------------------------------------------------------------
*/
Route::get('/', 'FrontController@index')->name('front.index');
Route::get('/related/{category}', 'FrontController@showRelatedArticles');
Route::get('/productos/{category}', 'FrontController@category');
Route::get('/productos/ver/{slug}/{category?}', 'FrontController@articleBySlug');
Route::get('/sendmessage', 'FrontController@messagesend')->name('send.message');


/*
|--------------------------------------------------------------------------
| Backend
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', 'HomeController@index')->name('home');
Route::resource('articles', 'ArticleController');
  Route::get('articles/add_image/{id}', 'ArticleController@storeImagesForm');
  Route::post('articles/add_image/{id}', 'ArticleController@storeArticleImages')->name('articles.add_article_images');
  Route::post('articles/add_background_image/{id}', 'ArticleController@storeBackgroundImages')->name('articles.add_background_image');
  Route::get('erase-article-pic/{id}',['uses' => 'ArticleController@eraseArticleImage', 'as' => 'articles.erase_image']);
  Route::get('erase-background-image/{id}',['uses' => 'ArticleController@erraseBackgroundImage' , 'as' => 'articles.erase_background_image']);
  Route::get('articles/update_image/{id}', 'ArticleController@updateImagesForm');
  //Route::post('articles/update_image/{id}', 'ArticleController@updateImages')->name('articles.add_images');
Route::resource('categories', 'CategoryController');
Route::resource('subcategories', 'SubcategoryController');
Route::resource('sliders', 'SliderController');
Route::resource('pictures', 'PicController');

Route::post('articles/search', ['uses' => 'ArticleController@searchResults', 'as' => 'articles.search']);

// Rutas auxiliares
Route::get('/addSlugs', 'CategoryController@addSlugToAll');

Route::get('/home', 'HomeController@index')->name('home');
