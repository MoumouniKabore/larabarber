<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

class DashboardIndexController extends Controller
{
    
    public function dashboardIndex() {
        
        $data = [
            'userCount'    => \App\Models\User::count(),
            'barberCount'  => \App\Models\Barber::count(),
            'bookingCount' => \App\Models\Booking::where('status', 'Confirmé')->count(),
            'pendingBookings' => \App\Models\Booking::where('status', 'En attente')->latest()->take(5)->get(),
            'recentMessages'  => \App\Models\Message::latest()->take(5)->get(),
            'totalTestimonies' => \App\Models\Testimonie::count(),
        ];

    return view('dashPages.index.index', $data);
    }
}
