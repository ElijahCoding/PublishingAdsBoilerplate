<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/user/area/{area}', 'User\AreaController@store')->name("user.area.store");


Route::group(['prefix' => '/{area}'], function() {

  /**
  * Category
  */
  Route::group(['prefix' => 'categories'], function() {
    Route::get('/', 'Category\CategoryController@index')->name('categories.index');

    Route::group(['prefix' => '/{category}'], function() {
      Route::get('/listings', 'Listing\ListingController@index')->name('listings.index');
    });
  });

  /**
  * Listing
  */
  Route::group(['prefix' => 'listings', 'namespace' => 'Listing'], function() {
    Route::get('/favorites', 'ListingFavoriteController@index')->name('listings.favorites.index');
    Route::post('/{listing}/favorites', 'ListingFavoriteController@store')->name('listings.favorites.store');
    Route::delete('/{listing}/favorites', 'ListingFavoriteController@destroy')->name('listings.favorites.destroy');

    Route::get('/viewed', 'ListingViewedController@index')->name('listings.viewed.index');

    Route::post('/{listing}/contact', 'ListingContactController@store')->name('listings.contact.store');


    Route::get('/{listing}/payment', 'ListingPaymentController@show')->name('listings.payment.show');
    Route::post('/{listing}/payment', 'ListingPaymentController@store')->name('listings.payment.store');


    // CRUD
    Route::group(['middleware' => 'auth'], function () {
      Route::get('/create', 'ListingController@create')->name('listings.create');
      Route::post('/', 'ListingController@store')->name('listings.store');

      Route::get('/{listing}/edit', 'ListingController@edit')->name('listings.edit');
      Route::patch('/{listing}', 'ListingController@update')->name('listings.update');

    });
  });

  Route::get('/{listing}', 'Listing\ListingController@show')->name('listings.show');

});
