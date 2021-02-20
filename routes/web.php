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
    return view('auth.login');
});



Auth::routes();


Route::get('/register', 'Auth\RegisterController@showForm')->name('register');

Route::group(['middleware' => ['auth', 'shareDataView']], function() {
    // Temporária
    Route::get('/home', function () {
        return redirect('/admin/home');
    });

    Route::get('/admin/home', 'HomeController@index')->name('admin.home');
    Route::get('/admin/chart', 'ChartController@show')->name('admin.chart');
    Route::get('/admin/chart/getVisits', 'ChartController@getVisits')->name('admin.product.getVisits');

    Route::get('/admin/product/show/{id}', 'ProductController@show')->name('admin.product.show');
    Route::get('/admin/product/create', 'ProductController@create')->name('admin.product.create');
    Route::post('/admin/product/create', 'ProductController@store')->name('admin.product.store');
    Route::get('/admin/product', 'ProductController@index')->name('admin.product.index');


    Route::get('/admin/company', 'ProcessController@indexCompany')->name('admin.company.index');


    // process
    Route::get('/admin/process', 'ProcessController@index')->name('admin.process.index');
    Route::get('/admin/product/show/{idProduct}/process/create', 'ProcessController@create')->name('admin.product.process.create');
    Route::get('/admin/product/show/{idProduct}/process/show/{id}', 'ProcessController@show')->name('admin.product.process.show');

    Route::post('/admin/product/show/{idProduct}/process/producer', 'ProducerProcessController@store')->name('admin.product.process.producer.store');


    //Laboratórios
    Route::get('/admin/process/{id}/laboratory', 'LaboratoryProcessController@create')->name('admin.product.process.laboratory.create');
    Route::post('/admin/process/{id}/laboratory', 'LaboratoryProcessController@store')->name('admin.product.process.laboratory.store');



    //Transportadoras
    Route::get('/admin/process/{id}/transport', 'TransportProcessController@create')->name('admin.product.process.transport.create');
    Route::post('/admin/process/{id}/transport', 'TransportProcessController@store')->name('admin.product.process.transport.store');


    //Indústria
    Route::get('/admin/process/{id}/industry', 'IndustryProcessController@create')->name('admin.product.process.industry.create');
    Route::post('/admin/process/{id}/industry', 'IndustryProcessController@store')->name('admin.product.process.industry.store');


});




//site
Route::get('/product/show/{id}', 'ProcessController@showSite')->name('site.product.show');
