<?php

Route::get('/', function () {
    return redirect(route('admin'));
});
// Admin
Route::prefix( '/admin' )->middleware('auth')->group( function ()
{
    // index
    Route::get('/', 'HomeController@home')->name('admin');
    // SuperVisors
    Route::prefix( '/supervisors' )->group( function ()
    {
        Route::get('/', 'SupervisorController@index')->name('supervisors');
        Route::get('/create', 'SupervisorController@create')->name('supervisors.create');
        Route::post('/store', 'SupervisorController@store')->name('supervisors.store');
        Route::get('/edit/{user}', 'SupervisorController@edit')->name('supervisors.edit');
        Route::put('/update/{user}', 'SupervisorController@update')->name('supervisors.update');
        Route::get( '/delete/{user}', 'SupervisorController@delete')->name('supervisors.delete');
    });
    // tickets
    Route::prefix( '/tickets' )->group( function ()
    {
        Route::get('/', 'TicketController@index')->name('tickets');
        Route::get('/create', 'TicketController@create')->name('tickets.create');
        Route::post('/store', 'TicketController@store')->name('tickets.store');
        Route::get('/view/{ticket}', 'TicketController@view')->name('tickets.view');
        Route::get('/edit/{ticket}', 'TicketController@edit')->name('tickets.edit');
        Route::put('/update/{ticket}', 'TicketController@update')->name('tickets.update');
        Route::get('/open/{ticket}', 'TicketController@open')->name('tickets.open');
        Route::get('/close/{ticket}', 'TicketController@close')->name('tickets.close');
        Route::get('/reopen/{ticket}', 'TicketController@reopen')->name('tickets.reopen');
        Route::get( '/delete/{ticket}', 'TicketController@delete')->name('tickets.delete');
    });
    // notifications
    Route::prefix( '/notifications' )->group( function ()
    {
        Route::get('/', 'NotificationController@index')->name('notifications');
        Route::get('/read/{notf}', 'NotificationController@read')->name('notifications.read');
    });
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
