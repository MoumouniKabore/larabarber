<?php

use App\Http\Controllers\BarberController;
use App\Http\Controllers\Pages\AllPagesController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HourController;
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

// Dash Page
    // auth
    Route::get('login', [AllPagesController::class, 'login'])->name('login');
    Route::get('register', [AllPagesController::class, 'register'])->name('register');

    // index-dash
    Route::get('index-dash', [AllPagesController::class, 'indexDash'])->name('index-dash');

    // user
    Route::get('add-user', [AllPagesController::class, 'addUser'])->name('add-user');
    Route::get('all-user', [AllPagesController::class, 'allUser'])->name('all-user');
    Route::get('edit-user', [AllPagesController::class, 'editUser'])->name('edit-user');
    Route::get('show-user', [AllPagesController::class, 'showUser'])->name('show-user');




    

    // barber
    Route::resource('barberResource', BarberController::class);
    Route::put('updateStatusBarber/{barber}', [BarberController::class, 'updateStatusBarber'])->name('updateStatusBarber');

    // hour
    Route::get('allHour', [HourController::class, 'allHour'])->name('allHour');
    Route::put('updateHour/{hour}', [HourController::class, 'updateHour'])->name('updateHour');

    // booking
    Route::get('allBooking', [BookingController::class, 'allBooking'])->name('allBooking');
    Route::post('storeBooking', [BookingController::class, 'storeBooking'])->name('storeBooking');
    Route::put('updateStatusBooking/{booking}', [BookingController::class, 'updateStatusBooking'])->name('updateStatusBooking');
    Route::delete('destroyBooking/{id}', [BookingController::class, 'destroyBooking'])->name('destroyBooking');

    // testimonie
    Route::get('allTestimonie', [TestimonieController::class, 'allTestimonie'])->name('allTestimonie');
    Route::post('storeTestimonie', [TestimonieController::class, 'storeTestimonie'])->name('storeTestimonie');
    Route::put('updateStatusTestimonie/{testimonie}', [TestimonieController::class, 'updateStatusTestimonie'])->name('updateStatusTestimonie');
    Route::delete('destroyTestimonie/{id}', [TestimonieController::class, 'destroyTestimonie'])->name('destroyTestimonie');

    // message
    Route::get('allMessage', [MessageController::class, 'allMessage'])->name('allMessage');
    Route::post('storeMessage', [MessageController::class, 'storeMessage'])->name('storeMessage');
    Route::put('updateStatusMessage/{message}', [MessageController::class, 'updateStatusMessage'])->name('updateStatusMessage');
    Route::delete('destroyMessage/{id}', [MessageController::class, 'destroyMessage'])->name('destroyMessage');