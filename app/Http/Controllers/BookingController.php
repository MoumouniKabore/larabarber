<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Models\Booking;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
// use Illuminate\Http\Request;

class BookingController extends Controller
{
    use AuthorizesRequests;
    
    public function AllBooking(): View {

        $bookings = Booking::latest()->get();
        return view('dashPages.booking.all', compact('bookings'));
    }

    public function storeBooking(StoreBookingRequest $request): RedirectResponse {

        $data = $request->validated();
        Booking::create($data);
        return redirect()->back()->with('success', 'Votre réservation a bien été envoyée !');
    }
    
    public function updateStatusBooking(Booking $booking): RedirectResponse {

        $newStatus = match($booking->status) {
            'Pas Encore Vu' => 'Répondu',
            'Répondu' => 'Pas Encore Vu',
        };
        $booking->update(['status' => $newStatus]);
        return redirect()->back()->with('success', 'Statut de '. $booking->first_name .' mis à jour.');
    }

    public function destroyBooking(string $idBooking): RedirectResponse {
        
        $booking = Booking::findOrFail($idBooking);
        $this->authorize('delete', $booking);
        $booking->delete();
        return redirect()->route('admin.allBooking')->with('success', 'Réservation supprimé avec succès.');
    }
}
