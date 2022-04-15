<?php
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::group([ 'namespace' => 'Page' ], function() {
    Route::group([ 'as' => 'page.' ], function() {
        Route::resource('/page/section', 'SectionController');
        Route::get('/page/media/{sectionId}/create', 'MediaController@create')->name('media.create');
    });
    Route::resource('/page', 'PageController');
});
Route::group([ 'namespace' => 'Ticket' ], function() {
    Route::group([ 'as' => 'ticket.' ], function() {
        Route::resource('/ticket/category', 'CategoryController');
    });
    Route::resource('/ticket', 'TicketController');
});
Route::group([ 'namespace' => 'Tour' ], function() {
    Route::group([ 'as' => 'tour.' ], function() {
        Route::resource('/tour/category', 'CategoryController');
    });
    Route::resource('/tour', 'TourController');
});
Route::resource('message', 'MessageController')->only(['index', 'show']);
Route::resource('setting', 'SettingController');


