<?php

use App\Http\Controllers\BarberController;
use App\Http\Controllers\Pages\AllPagesController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardIndexController;
use App\Http\Controllers\HourController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\TestimonieController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Main Page
    Route::get('/', [AllPagesController::class, 'index'])->name('index');
    Route::get('about', [AllPagesController::class, 'about'])->name('about');
    Route::get('services', [AllPagesController::class, 'services'])->name('services');
    Route::get('pricing', [AllPagesController::class, 'pricing'])->name('pricing');
    Route::get('galleries', [AllPagesController::class, 'galleries'])->name('galleries');
    Route::get('booking', [AllPagesController::class, 'booking'])->name('booking');
    Route::get('contact', [AllPagesController::class, 'contact'])->name('contact');
// End Main Page

    
// Routes d'authentification
    Route::get('login', [LoginController::class, 'showLogin'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
// End Routes d'authentification


// Dash Page 
    Route::middleware('auth', 'admin')->name('admin.')->group(function() {
        
        // dashboardIndex
        Route::get('dashboardIndex', [DashboardIndexController::class, 'dashboardIndex'])->name('dashboardIndex');

        // user
        Route::resource('userResource', UserController::class);
        Route::put('updateStatusUser/{user}', [UserController::class, 'updateStatusUser'])->name('updateStatusUser');

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

        // logout
        Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    });
// End Dash Page 