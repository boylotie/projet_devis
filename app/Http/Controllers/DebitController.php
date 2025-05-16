<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Debit;
use Illuminate\Support\Facades\Auth;
use PDF; // alias de DomPDF

class DebitController extends Controller
{
    public function generate(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string',
            'montant' => 'required|numeric',
            'motif' => 'required|string',
            'date' => 'required|date',
        ]);

        // Enregistrement en BDD
        $debit = Debit::create([
            'user_id' => Auth::id(),
            'nom' => $data['nom'],
            'montant' => $data['montant'],
            'motif' => $data['motif'],
            'date' => $data['date'],
        ]);

        // Génération PDF
        $pdf = PDF::loadView('debit.pdf', $data);

        return $pdf->download('debit_' . now()->format('Ymd_His') . '.pdf');
    }

    public function index()
    {
        $debits = Debit::where('user_id', Auth::id())->latest()->get();
        return view('debit.index', compact('debits'));
    }

}

