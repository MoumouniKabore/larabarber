<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AllPagesController extends Controller
{

    // Main Pages
    public function indexPage() {
        return view('mainPages.index');
    }

    public function about() {
        return view('mainPages.about');
    }

    public function services() {
        return view('mainPages.services');
    }

    public function pricing() {
        return view('mainPages.pricing');
    }

    public function galleries() {
        return view('mainPages.galleries');
    }

    public function booking() {
        return view('mainPages.booking');
    }

    public function contact() {
        return view('mainPages.contact');
    }

    // Dash Pages

    // auth
    public function login() {
        return view('dashPages.auth.login');
    }

    public function register() {
        return view('dashPages.auth.register');
    }

    // Index Dash
    public function indexDash() {
        return view('dashPages.index.index');
    }

    // barber
    public function addBarber() {
        return view('dashPages.barber.add');
    }

    public function allBarber() {
        return view('dashPages.barber.all');
    }

    public function editBarber() {
        return view('dashPages.barber.edit');
    }

    public function showBarber() {
        return view('dashPages.barber.show');
    }

    // user
    public function addUser() {
        return view('dashPages.user.add');
    }

    public function allUser() {
        return view('dashPages.user.all');
    }

    public function editUser() {
        return view('dashPages.user.edit');
    }

    public function showUser() {
        return view('dashPages.user.show');
    }

    // hour
    public function addHour() {
        return view('dashPages.hour.add');
    }

    public function allHour() {
        return view('dashPages.hour.all');
    }

    public function editHour() {
        return view('dashPages.hour.edit');
    }

    // booking
    public function allBooking() {
        return view('dashPages.booking.all');
    }

    public function showBooking() {
        return view('dashPages.booking.show');
    }

    // testimonie
    public function allTestimonie() {
        return view('dashPages.testimonie.all');
    }

    public function showTestimonie() {
        return view('dashPages.testimonie.show');
    }

    // message
    public function allMessage() {
        return view('dashPages.message.all');
    }

    public function showMessage() {
        return view('dashPages.message.show');
    }

}