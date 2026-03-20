<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Barber;
use App\Models\Hour;
use App\Models\Testimonie;
// use Illuminate\Http\Request;

class AllPagesController extends Controller
{

    // Main Pages
    public function index() {

        $hours = Hour::all();
        $barbers = Barber::all();
        $testimonies = Testimonie::where('status', 'Publié')->get();
        return view('mainPages.index', compact('testimonies', 'hours', 'barbers'));
    }

    public function about() {
        
        $barbers = Barber::all();
        return view('mainPages.about', compact('barbers'));
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

        $hours = Hour::all();
        return view('mainPages.booking', compact('hours'));
    }

    public function contact() {

        $hour1 = Hour::where('id', 1)->first();
        $hour2 = Hour::where('id', 5)->first();
        $hour3 = Hour::where('id', 6)->first();
        $hour4 = Hour::where('id', 7)->first();
        return view('mainPages.contact', compact('hour1', 'hour2', 'hour3', 'hour4'));
    }
}