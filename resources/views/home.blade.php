@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <a href="{{ route('debit.index') }}" class="btn btn-primary">Voir mes débits</a>

            <div class="card shadow">
                <div class="card-header bg-primary text-white">{{ __('Dashboard - Générer un débit') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('debit.generate') }}">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="nom">Nom du client</label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="montant">Montant (FCFA)</label>
                            <input type="number" class="form-control" id="montant" name="montant" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="motif">Motif du débit</label>
                            <textarea class="form-control" id="motif" name="motif" rows="3" required></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>

                        <button type="submit" class="btn btn-success">Générer le PDF</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
