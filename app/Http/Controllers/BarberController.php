<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBarberRequest;
use App\Http\Requests\UpdateBarberRequest;
use App\Models\Barber;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class BarberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {

        $barbers = Barber::latest()->get();
        return view('dashPages.barber.all', compact('barbers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {

        return view('dashPages.barber.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBarberRequest $request) {
        $data = $request->validated();
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $path = $image->storeAs('barber', $filename, 'public');
            $data['photo'] = $path;
        }
        Barber::create($data);
        return redirect()->route('barberResource.index')->with('success', 'Coiffeur créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($barber) {

        $barber = Barber::findOrFail($barber);
        return view('dashPages.barber.edit', compact('barber'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBarberRequest $request, Barber $barber) {
        $data = $request->validated();
        if ($request->hasFile('photo')) {
            // Nettoyage de l'ancienne photo
            if ($barber->photo) {
                Storage::disk('public')->delete($barber->photo);
            }
            $image = $request->file('photo');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $path = $image->storeAs('barber', $filename, 'public');
            $data['photo'] = $path;
        }
        $barber->update($data);
        return redirect()->route('barberResource.index')->with('success', 'Profil mis à jour.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($barber) {
    
        $barber = Barber::find($barber);
        if (Storage::disk('public')->exists($barber->photo)) {
            Storage::disk('public')->delete($barber->photo);
        }
        $barber->delete();
        return back()->with('success', 'Coiffeur supprimé de la base.');
    }
    
    public function updateStatusBarber(Barber $barber): RedirectResponse {

        $newStatus = match($barber->status) {
            'En Attente' => 'Actif',
            'Actif' => 'En Attente',
        };
        $barber->update(['status' => $newStatus]);
        return redirect()->back()->with('success', 'Statut de '. $barber->first_name .' mis à jour.');
    }
}