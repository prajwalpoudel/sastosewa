<?php
Route::get('/', 'HomeController@index')->name('index');
Route::get('about', 'AboutController@index')->name('about.index');
Route::get('tours', 'TourController@index')->name('tour.index');
Route::get('tour/{tour}', 'TourController@show')->name('tour.show');
Route::get('tickets', 'TicketController@index')->name('ticket.index');
Route::get('ticket/search', 'TicketController@search')->name('ticket.search');
Route::get('ticket/{id}/book', 'TicketController@book')->name('ticket.book');
Route::get('contact-us', 'ContactController@index')->name('contact.index');
Route::post('contact', 'ContactController@store')->name('contact.store');


