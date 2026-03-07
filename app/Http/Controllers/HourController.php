<?php

namespace App\Http\Controllers;

use App\Models\Hour;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HourController extends Controller
{
    public function AllHour(): View {

        $hours = Hour::latest()->get();
        return view('dashPages.hour.all', compact('hours'));
    }

    public function updateHour(Request $request, Hour $hour): RedirectResponse {

        // 1. Validation des données
        $validated = $request->validate([
            'time' => 'required|string|max:50',
        ]);

        // 2. Mise à jour dans la base de données
        $hour->update([
            'time' => $validated['time']
        ]);

        // 3. Redirection avec message de succès
        return redirect()->back()->with('success', "L'horaire du {$hour->day} a été mis à jour avec succès !");
    }
}
