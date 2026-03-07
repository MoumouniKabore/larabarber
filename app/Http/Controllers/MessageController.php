<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreMessageRequest;
use Illuminate\View\View;

class MessageController extends Controller
{
    public function AllMessage(): View {

        $messages = Message::latest()->get();
        return view('dashPages.message.all', compact('messages'));
    }
    
    public function storeMessage(StoreMessageRequest $request): RedirectResponse {

        $validated = $request->validated();
        Message::create($validated);
        return redirect()->back()->with('success', 'Votre message a bien été envoyé !');
    }
    
    public function updateStatusMessage(Message $message): RedirectResponse {

        $newStatus = match($message->status) {
            'Pas Encore Vu' => 'Répondu',
            'Répondu' => 'Pas Encore Vu',
        };
        $message->update(['status' => $newStatus]);
        return redirect()->back()->with('success', 'Statut de '. $message->first_name .' mis à jour.');
    }

    public function destroyMessage(string $idMessage): RedirectResponse {
        
        $message = Message::findOrFail($idMessage);
        $message->delete();
        return redirect()->route('allMessage')->with('success', 'Message supprimé avec succès.');
    }
}
