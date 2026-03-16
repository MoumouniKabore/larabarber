<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        
        $users = User::latest()->get();
        return view('dashPages.user.all', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {

        return view('dashPages.user.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request) {

        $data = $request->validated();

        // Gestion de la photo
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('user', $filename, 'public');
            $data['photo'] = $path;
        }

        // Hachage du mot de passe
        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()->route('admin.userResource.index')->with('success', 'Utilisateur créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($user) { 

        $user = User::findOrFail($user);
        return view('dashPages.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $userResource) {
        
        $data = $request->validated();

        // Gestion de la photo
        if ($request->hasFile('photo')) {
            // Suppression de l'ancienne photo si elle existe
            if ($userResource->photo && Storage::disk('public')->exists($userResource->photo)) {
                Storage::disk('public')->delete($userResource->photo);
            }
            
            $image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('user', $filename, 'public');
            $data['photo'] = $path;
        }

        // Gestion du mot de passe : on ne le modifie que s'il est rempli
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']); // On le retire pour ne pas écraser l'ancien par du vide
        }

        $userResource->update($data);

        return redirect()->route('admin.userResource.index')->with('success', 'Profil utilisateur mis à jour.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($barber) {
        
        $user = User::findOrFail($barber);

        // Suppression de la photo du stockage
        if (!empty($user->photo) && Storage::disk('public')->exists($user->photo)) {
            Storage::disk('public')->delete($user->photo);
        }

        $user->delete();

        return back()->with('success', 'Utilisateur supprimé.');
    }


    public function updateStatusUser(User $user): RedirectResponse {

        $newStatus = match($user->status) {
            'Actif' => 'En Attente',
            'En Attente' => 'Actif',
        };

        $user->update(['status' => $newStatus]);

        return redirect()->back()->with('success', 'Statut de ' . $user->first_name . ' mis à jour.');
    }
}
