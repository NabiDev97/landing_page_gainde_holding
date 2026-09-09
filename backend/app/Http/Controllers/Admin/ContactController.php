<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Barryvdh\DomPDF\Facade\Pdf;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderByDesc('created_at')->paginate(20);

        return view('admin.contacts.index', compact('contacts'));
    }

    public function show(Contact $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    public function download(Contact $contact)
    {
        $pdf = Pdf::loadView('admin.contacts.pdf', compact('contact'));

        $filename = 'demande-devis-' . ($contact->id ?? 'inconnu') . '-' . ($contact->created_at?->format('Ymd_His') ?? now()->format('Ymd_His')) . '.pdf';

        return $pdf->download($filename);
    }
}
