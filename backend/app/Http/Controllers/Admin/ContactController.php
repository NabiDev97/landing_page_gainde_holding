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
        $logoSvg = <<<'SVG'
<svg width="90" height="90" viewBox="0 0 90 90" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="GAÏNDE-HOLDING">
    <rect x="5" y="5" width="80" height="80" rx="12" fill="#111827"/>
    <rect x="16" y="16" width="58" height="58" rx="10" fill="#f59e0b"/>
    <path d="M29 58 L45 24 L61 58" fill="none" stroke="#ffffff" stroke-width="7" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M34 46 H56" stroke="#ffffff" stroke-width="7" stroke-linecap="round"/>
    <text x="45" y="74" text-anchor="middle" font-size="9" font-family="Arial, sans-serif" font-weight="700" fill="#111827">GH</text>
</svg>
SVG;

        $pdf = Pdf::loadView('admin.contacts.pdf', compact('contact', 'logoSvg'));

        $filename = 'demande-devis-' . ($contact->id ?? 'inconnu') . '-' . ($contact->created_at?->format('Ymd_His') ?? now()->format('Ymd_His')) . '.pdf';

        return $pdf->download($filename);
    }
}
