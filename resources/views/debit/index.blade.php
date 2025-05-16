@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Liste de vos débits</h2>
    
    @if($debits->isEmpty())
        <div class="alert alert-info">Aucun débit enregistré pour le moment.</div>
    @else
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Montant</th>
                <th>Motif</th>
                <th>Date</th>
                <th>Créé le</th>
            </tr>
        </thead>
        <tbody>
            @foreach($debits as $debit)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $debit->nom }}</td>
                <td>{{ number_format($debit->montant, 2, ',', ' ') }} FCFA</td>
                <td>{{ $debit->motif }}</td>
                <td>{{ $debit->date }}</td>
                <td>{{ $debit->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    <a href="{{ route('dashboard') }}" class="btn btn-secondary mt-3">Retour au Dashboard</a>
</div>
@endsection
