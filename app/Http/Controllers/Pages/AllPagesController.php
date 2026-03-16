<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;

class AllPagesController extends Controller
{

    // Main Pages
    public function index() {
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
}