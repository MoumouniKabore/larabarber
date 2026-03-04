<?php

use App\Http\Controllers\Pages\AllPagesController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\TestimonieController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Main Page
    Route::get('index-page', [AllPagesController::class, 'indexPage'])->name('index-page');
    Route::get('about', [AllPagesController::class, 'about'])->name('about');
    Route::get('services', [AllPagesController::class, 'services'])->name('services');
    Route::get('pricing', [AllPagesController::class, 'pricing'])->name('pricing');
    Route::get('galleries', [AllPagesController::class, 'galleries'])->name('galleries');
    Route::get('booking', [AllPagesController::class, 'booking'])->name('booking');
    Route::get('contact', [AllPagesController::class, 'contact'])->name('contact');


    Route::post('storeBooking', [BookingController::class, 'storeBooking'])->name('storeBooking');

// Dash Page
    // auth
    Route::get('login', [AllPagesController::class, 'login'])->name('login');
    Route::get('register', [AllPagesController::class, 'register'])->name('register');

    // index-dash
    Route::get('index-dash', [AllPagesController::class, 'indexDash'])->name('index-dash');

    // barber
    Route::get('add-barber', [AllPagesController::class, 'addBarber'])->name('add-barber');
    Route::get('all-barber', [AllPagesController::class, 'allBarber'])->name('all-barber');
    Route::get('edit-barber', [AllPagesController::class, 'editBarber'])->name('edit-barber');
    Route::get('show-barber', [AllPagesController::class, 'showBarber'])->name('show-barber');

    // user
    Route::get('add-user', [AllPagesController::class, 'addUser'])->name('add-user');
    Route::get('all-user', [AllPagesController::class, 'allUser'])->name('all-user');
    Route::get('edit-user', [AllPagesController::class, 'editUser'])->name('edit-user');
    Route::get('show-user', [AllPagesController::class, 'showUser'])->name('show-user');

    // hour
    Route::get('add-hour', [AllPagesController::class, 'addHour'])->name('add-hour');
    Route::get('all-hour', [AllPagesController::class, 'allHour'])->name('all-hour');
    Route::get('edit-hour', [AllPagesController::class, 'editHour'])->name('edit-hour');

    // booking
    Route::get('all-booking', [AllPagesController::class, 'allBooking'])->name('all-booking');
    Route::get('show-booking', [AllPagesController::class, 'showBooking'])->name('show-booking');

    // testimonie
    Route::get('allTestimonie', [TestimonieController::class, 'allTestimonie'])->name('allTestimonie');
    Route::post('storeTestimonie', [TestimonieController::class, 'storeTestimonie'])->name('storeTestimonie');
    Route::put('updateStatus/{testimonie}', [TestimonieController::class, 'updateStatus'])->name('updateStatus');
    Route::delete('destroyTestimonie/{id}', [TestimonieController::class, 'destroyTestimonie'])->name('destroyTestimonie');

    // message
    Route::get('allMessage', [MessageController::class, 'allMessage'])->name('allMessage');
    Route::post('storeMessage', [MessageController::class, 'storeMessage'])->name('storeMessage');
    Route::put('updateStatus/{message}', [MessageController::class, 'updateStatus'])->name('updateStatus');
    Route::delete('destroyMessage/{id}', [MessageController::class, 'destroyMessage'])->name('destroyMessage');