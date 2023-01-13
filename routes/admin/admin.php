<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' =>['web', 'auth:admin']], function() {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::group([ 'namespace' => 'Page' ], function() {
        Route::group([ 'as' => 'page.' ], function() {
            Route::resource('/page/section', 'SectionController');
            Route::get('/page/media/', 'MediaController@index')->name('media.index');
            Route::get('/page/media/{sectionId}/create', 'MediaController@create')->name('media.create');
            Route::post('/page/media/', 'MediaController@store')->name('media.store');
            Route::delete('/page/media/{mediaId}/delete', 'MediaController@destroy')->name('media.destroy');
        });
        Route::resource('/page', 'PageController');
    });
    Route::group([ 'namespace' => 'Ticket' ], function() {
        Route::group([ 'as' => 'ticket.' ], function() {
            Route::resource('/ticket/category', 'CategoryController');
            Route::resource('/ticket/brand', 'BrandController');
            Route::resource('/ticket/booking', 'BookingController')->only(['index', 'show', 'destroy']);

        });
        Route::resource('/ticket', 'TicketController');
    });
    Route::group([ 'namespace' => 'Tour' ], function() {
        Route::group([ 'as' => 'tour.' ], function() {
            Route::resource('/tour/category', 'CategoryController');
            Route::resource('/tour/booking', 'BookingController')->only(['index', 'show', 'destroy']);

        });
        Route::resource('/tour', 'TourController');
    });
    Route::group([ 'namespace' => 'Taxi' ], function() {
        Route::resource('/taxi-booking', 'BookingController')->only(['index', 'show', 'destroy']);
        Route::resource('/taxi-detail', 'DetailController');
        Route::resource('/taxi', 'TaxiController');
    });

    Route::resource('message', 'MessageController')->only(['index', 'show']);
    Route::resource('setting', 'SettingController');
    Route::resource('testimonial', 'TestimonialController');

    Route::group([ 'namespace' => 'Labor' ], function() {
        Route::resource('labor', 'LaborController')->except(['show']);
        Route::group(['as' => 'labor.', 'prefix'=>'labor'], function() {
            Route::get('document/{laborId}/create', 'DocumentController@create')->name('document.create');
            Route::resource('document', 'DocumentController')->except(['create', 'show']);
            Route::group(['as' => 'document.', 'prefix' => 'document'], function() {
                Route::get('media/{laborDocumentId}/create', 'DocumentMediaController@create')->name('media.create');
                Route::resource('media', 'DocumentMediaController')->except(['create']);
            });
        });
    });
    Route::resource('country', 'CountryController');

});

require __DIR__.'/auth.php';






