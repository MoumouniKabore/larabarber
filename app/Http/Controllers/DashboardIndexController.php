<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

class DashboardIndexController extends Controller
{
    
    public function dashboardIndex() {
        
        return view('dashPages.index.index');
    }
}
