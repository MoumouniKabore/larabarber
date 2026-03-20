<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTestimonieRequest;
use App\Models\Testimonie;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TestimonieController extends Controller
{
    use AuthorizesRequests;
    
    public function AllTestimonie(): View {

        $testimonies = Testimonie::latest()->get();
        return view('dashPages.testimonie.all', compact('testimonies'));
    }
    
    public function storeTestimonie(StoreTestimonieRequest $request): RedirectResponse
    {

        $data = $request->validated();
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $path = $image->storeAs('testimonie', $filename, 'public');
            $data['photo'] = $path;
        }
        Testimonie::create($data);
        return redirect()->back()->with('success', 'Votre avis a bien été envoyé !');
    }
    
    public function updateStatusTestimonie(Testimonie $testimonie): RedirectResponse {

        $newStatus = match($testimonie->status) {
            'Pas Encore Publié' => 'Publié',
            'Publié' => 'Pas Encore Publié',
        };
        $testimonie->update(['status' => $newStatus]);
        return redirect()->back()->with('success', 'Statut de '. $testimonie->first_name .' mis à jour.');
    }

    public function destroyTestimonie(string $idTestimonie): RedirectResponse {
        
        $testimonie = Testimonie::findOrFail($idTestimonie);
        $this->authorize('delete', $testimonie);
        $testimonie->delete();
        return redirect()->route('admin.allTestimonie')->with('success', 'Avis supprimé avec succès.');
    }
}
