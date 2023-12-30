<?php

use App\Http\Controllers\Admin\AdminController;
use App\Models\category;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ChildCategoryController;
use App\Http\Controllers\Admin\BrandController;

Route::get('/admin-login', [App\Http\Controllers\Auth\LoginController::class, 'AdminLogin'])
    ->name('admin.login');

Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'admin'])
    ->name('admin.home')
    ->middleware('IsAdmin'); // Ensure it's spelled exactly as registered in the aliases


Route::group(['namespace' => 'App\Http\Controllers\Admin', 'middleware' => 'IsAdmin'], function () {
    Route::post('/admin/logout', 'AdminController@logout')->name('admin.logout');
    Route::post('/admin/home', 'AdminController@admin')->name('admin.home');

    //  category

    Route::prefix('category')->group(function () {
        Route::get('/', 'CategoryController@index')->name('category.index');
        Route::post('/store', 'CategoryController@store')->name('category.store');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('category.edit');
        Route::post('/update/{id}', 'CategoryController@update')->name('category.update');
        Route::get('/destroy/{id}', 'CategoryController@destroy')->name('category.destroy');
    });




    //  SubCategory

    Route::prefix('subcategory')->group(function () {
        Route::get('/', 'SubCategoryController@index')->name('subcategory.index');
        Route::post('/store', 'SubCategoryController@store')->name('subcategory.store');
        Route::get('/edit/{id}', 'SubCategoryController@edit')->name('subcategory.edit');
        Route::post('/update/{id}', 'SubCategoryController@update')->name('subcategory.update');
        Route::get('/destroy/{id}', 'SubCategoryController@destroy')->name('subcategory.destroy');
    });

     //  SubCategory

     Route::prefix('childcategory')->group(function () {
        Route::get('/', 'ChildController@index')->name('childcategory.index');
        Route::post('/store', 'ChildController@store')->name('childcategory.store');
        Route::get('/edit/{id}', 'ChildController@edit')->name('childcategory.edit');
        Route::post('/update/{id}', 'ChildController@update')->name('childcategory.update');
        Route::get('/destroy/{id}', 'ChildController@destroy')->name('childcategory.destroy');
    });

    // brand


    Route::prefix('brand')->group(function () {
        Route::get('/', 'BrandController@index')->name('brand.index');
        Route::post('/store', 'BrandController@store')->name('brand.store');
        Route::get('/edit/{id}', 'BrandController@edit')->name('brand.edit');

        Route::post('/update/{id}', 'BrandController@update')->name('brand.update');
         Route::get('/destroy/{id}', 'BrandController@destroy')->name('brand.destroy');
    });
});
