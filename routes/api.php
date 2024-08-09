<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\TicketController;
use App\Http\Controllers\Api\TicketTypeController;
use App\Http\Controllers\Api\OrderIntentController;

Route::prefix('events')->controller(EventController::class)->group(function () {
    Route::get('', 'index')->name('events.index');
    Route::get('{event}/ticket-types', 'getTicketTypes')->name('events.ticket-types');
});

Route::prefix('orders-intents')->controller(OrderIntentController::class)->group(function () {
    Route::post('', 'store')->name('orders-intents.store');
});


Route::prefix('orders')->controller(OrderController::class)->group(function () {
    Route::post('', 'store')->name('orders.store');
    Route::get('{user}/all', 'getUsersOrders')->name('orders.users-orders');
});