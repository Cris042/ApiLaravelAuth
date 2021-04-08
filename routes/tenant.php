<?php
/**
 * Created by PhpStorm.
 * User: Cuthbert Mirambo
 * Date: 4/28/2018
 * Time: 7:01 PM
 */

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here is where you can register 'tenant' routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "tenant" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::group(['as' => 'tenant.'], function () {


    /**
     * book
    */

    Route::get('/book', 'BookController@Index')->name('library.book');
    Route::get('/book/edit/{id}', 'BookController@Show')->name('library.book.edit');
    Route::put('/book/edit/{id}', 'BookController@Update')->name('library.book.edit');
    Route::delete('/book/delet/{id}', 'BookController@Destroy')->name('library.book.destroy');
    Route::post('/creatBook', 'BookController@Store')->name('library.book.store');
    Route::any('/bookSearch', 'BookController@Search')->name('library.book.search');

    /**
     * client
    */

    Route::get('/client', 'ClientController@Index')->name('library.client');
    Route::get('/client/edit/{id}', 'ClientController@Show')->name('library.client.edit');
    Route::put('/client/edit/{id}', 'ClientController@Update')->name('library.client.edit');
    Route::delete('/client/delet/{id}', 'ClientController@Destroy')->name('library.client.destroy');
    Route::post('/creatclient', 'ClientController@Store')->name('library.client.store');
    Route::any('/clientSearch', 'ClientController@Search')->name('library.client.search');

    /**
     * loands
    */
   
    Route::get('/loands', 'LoandsController@Index')->name('library.loands');
    Route::post('/creatLoands', 'LoandsController@Store')->name('library.loands.store');
    Route::put('/editLoands/{id}', 'LoandsController@Update')->name('library.loands.edit');
    Route::any('/loandsSearch', 'LoandsController@Search')->name('library.loands.search');
    
    /**
    * --------------------------------------------------------------------------
    * Dashboard
    *
    * Alternative tenant dashboard route
    * --------------------------------------------------------------------------
    *
    * All other tenant routes should go above this one
    */
    Route::get('/{company}', 'DashboardController@index')->name('dashboard');
        

});
