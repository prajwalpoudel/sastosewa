<?php
Route::get('/', 'HomeController@index')->name('index');
Route::get('about', 'AboutController@index')->name('about.index');
Route::get('tours', 'TourController@index')->name('tour.index');
Route::get('tour/{tour}', 'TourController@show')->name('tour.show');
Route::get('tour/{id}/book', 'TourController@book')->name('tour.book');
Route::post('tour/book', 'TourController@bookTour')->name('tour.book.store');

Route::get('tickets', 'TicketController@index')->name('ticket.index');
Route::get('ticket/search', 'TicketController@search')->name('ticket.search');
Route::get('ticket/{id}/book', 'TicketController@book')->name('ticket.book');
Route::post('ticket/book', 'TicketController@bookTicket')->name('ticket.book.store');

Route::get('taxi-service', 'TaxiController@index')->name('taxi.index');
Route::get('taxi-service/{id}/book', 'TaxiController@book')->name('taxi.book');
Route::post('taxi-service/book', 'TaxiController@bookTaxi')->name('taxi.book.store');

Route::get('contact-us', 'ContactController@index')->name('contact.index');
Route::post('contact', 'ContactController@store')->name('contact.store');

Route::get('profile', 'ProfileController@index')->name('profile.index');
Route::get('profile/edit', 'ProfileController@edit')->name('profile.edit');
Route::patch('profile/{id}', 'ProfileController@update')->name('profile.update');

Route::get('bookings', 'BookingController@index')->name('bookings.index');
Route::get('bookings/{id}', 'BookingController@show')->name('bookings.show');




