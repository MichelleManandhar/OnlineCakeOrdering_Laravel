    <?php

use App\Http\Controllers\PagesController;

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

Route::get('/', 'PagesController@index');
Route::get('/home', 'PagesController@index');
Route::get('/cakes', 'PagesController@cake');
Route::get('/about', 'PagesController@about');


Route::get('/admin', 'AdminController@index');
Route::get('/admin/dashboard', 'AdminController@index');
Route::get('/admin/cakes', 'AdminController@cake');
Route::get('/admin/order', 'AdminController@order');
Route::get('/admin/design', 'AdminController@design');

Route::resource('cakes', 'CakesController');
Route::resource('order', 'OrderController');
Route::resource('design', 'CakeDesignController');

Route::post('/cakes/order', 'OrderController@save_design');
Route::get('/cakes/order/cancel', 'OrderController@cancelOrder');

Auth::routes();

Route::get('/home', 'PagesController@index')->name('home');
Route::post('/login/custom', [
    'uses' => 'LoginController@login',
    'as' => 'login.custom'
]);

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', 'PagesController@index')->name('home');
    Route::get('/admin', 'AdminController@index')->name('dashboard');
});