<?php
if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    // Ignores notices and reports all other kinds... and warnings
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}
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
Route::get('/apitest', 'APIController@getJson')->name('test.api');
Route::get('/importExcel', function(){ return view('test');})->name('importExcel.get');
Route::post('/importExcel', 'ExcelController@importUsers')->name('importExcel.post');

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

// Mails
Route::get('/sendmessage', 'FrontController@messagesend')->name('send.message');
Route::post('/sendregister', 'FrontController@registersend')->name('send.register');

Route::get('/contacto', 'FrontController@contacto');
Route::get('/extra', 'FrontController@extra');
Route::get('/formulario', 'FrontController@formulario');
Route::get('/nosotros', 'FrontController@nosotros');

Route::post('products/search', ['uses' => 'FrontController@search', 'as' => 'front.search']);
Route::get('products/fichas', ['uses' => 'FrontController@fichas', 'as' => 'front.fichas']);

/*
|--------------------------------------------------------------------------
| Backend
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', 'HomeController@index')->name('home');
Route::resource('articles', 'ArticleController');
  Route::get('articles/add_image/{id}', 'ArticleController@storeImagesForm');
  Route::post('articles/add_image/{id}', 'ArticleController@storeArticleImages')->name('articles.add_article_images');
  Route::post('articles/add_background_image/{id}', 'ArticleController@storeBackgroundImage')->name('articles.add_background_image');
  Route::get('erase-article-pic/{id}',['uses' => 'ArticleController@eraseArticleImage', 'as' => 'articles.erase_image']);
  Route::get('erase-background-image/{id}',['uses' => 'ArticleController@eraseBackgroundImage' , 'as' => 'articles.erase_background_image']);
  Route::get('articles/update_image/{id}', 'ArticleController@updateImagesForm');
  //Route::post('articles/update_image/{id}', 'ArticleController@updateImages')->name('articles.add_images');
Route::resource('categories', 'CategoryController');
Route::resource('subcategories', 'SubcategoryController');
Route::resource('sliders', 'SliderController');
Route::resource('pictures', 'PicController');

Route::post('articles/search', ['uses' => 'ArticleController@index', 'as' => 'articles.search']);

// Distribuidores
Route::get('/users/create', 'DistribuidorController@crudUsuarios');
Route::get('/users/perfil', 'DistribuidorController@perfilUsuarios');
Route::get('/users/index', 'DistribuidorController@indexUsuarios');
Route::get('/users/productos', 'DistribuidorController@ventasListaProductos');
Route::get('/users/vendedores', 'DistribuidorController@ventasListaVendedores');
Route::get('/users/perfil/vendedores', 'DistribuidorController@ventasVendedorPerfil');
Route::get('/distribuidor/perfil', ['uses' => 'DistribuidorController@distribuidorPerfil', 'as' => 'distributors.perfil']);
Route::get('/distribuidor/facturas', ['uses' => 'DistribuidorController@distribuidorFacturas', 'as' => 'distributors.facturas']);
Route::get('/distribuidor/pedidos', ['uses' => 'DistribuidorController@distribuidorPedidos', 'as' => 'distributors.pedidos']);

// Rutas auxiliares
Route::get('/addSlugs', 'CategoryController@addSlugToAll');

Route::get('/home', 'HomeController@index')->name('home');
