<?php

namespace App\Http\Controllers;

use App\Jobs\SendQuoteRequestEmail;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'project_type' => 'nullable|string|max:255',
            'project_address' => 'nullable|string|max:255',
            'surface' => 'nullable|string|max:255',
            'budget' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'duration_months' => 'nullable|integer|min:0',
            'details' => 'required|string',
        ]);

        $projectDetails = collect([
            'Type de projet' => $validated['project_type'] ?? 'Non précisé',
            'Adresse du projet' => $validated['project_address'] ?? 'Non précisé',
            'Surface' => $validated['surface'] ? $validated['surface'] . ' m²' : 'Non précisé',
            'Budget estimé' => $validated['budget'] ?? 'Non précisé',
            'Date de début souhaitée' => $validated['start_date'] ?? 'Non précisé',
            'Délai prévu' => isset($validated['duration_months']) ? $validated['duration_months'] . ' mois' : 'Non précisé',
        ])->map(fn ($value, $label) => "$label : $value")->implode("\n");

        $contact = Contact::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'subject' => 'Demande de devis' . ($validated['project_type'] ? ' - ' . $validated['project_type'] : ''),
            'message' => $projectDetails . "\n\nDescription du projet :\n" . $validated['details'],
        ]);

        SendQuoteRequestEmail::dispatch($contact, $validated);

        return redirect()->back()->with('success', 'Votre demande de devis a bien été enregistrée. Nous vous contacterons bientôt.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
