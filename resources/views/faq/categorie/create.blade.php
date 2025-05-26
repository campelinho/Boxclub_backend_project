
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Nieuwe FAQ Categorie</h2>

    <form action="{{ route('faq-categorie.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="naam" class="form-label">Naam</label>
            <input type="text" name="naam" id="naam" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Opslaan</button>
        <a href="{{ route('faq-categorie.index') }}" class="btn btn-secondary">Annuleren</a>
    </form>
</div>
@endsection
