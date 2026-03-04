<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Models\Booking;
use Illuminate\Http\RedirectResponse;
// use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function storeBooking(StoreBookingRequest $request): RedirectResponse
    {
        // 1. Les données sont déjà validées ici grâce à StoreBookingRequest
        $data = $request->validated();

        // 2. Enregistrement en base de données
        Booking::create($data);

        // 3. Redirection avec un message de succès
        return redirect()->back()->with('success', 'Votre réservation a bien été envoyée !');
    }
}
