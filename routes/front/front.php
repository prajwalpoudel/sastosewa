<?php
Route::get('/', 'HomeController@index')->name('index');
Route::get('about', 'AboutController@index')->name('about.index');
Route::get('tours', 'TourController@index')->name('tour.index');
Route::get('tour/{tour}', 'TourController@show')->name('tour.show');
Route::get('tickets', 'TicketController@index')->name('ticket.index');
Route::get('contact-us', 'ContactController@index')->name('contact.index');

