<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        $pdf = PDF::loadView('debit.pdf', $data);

        return $pdf->download('debit_' . now()->format('Ymd_His') . '.pdf');
    }
}

