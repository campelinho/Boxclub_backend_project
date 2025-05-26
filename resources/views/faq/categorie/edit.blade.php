@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Categorie Bewerken</h2>

    <form action="{{ route('faq-categorie.update', $faqCategorie->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="naam" class="form-label">Naam</label>
            <input type="text" name="naam" id="naam" class="form-control" value="{{ old('naam', $faqCategorie->naam) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Bijwerken</button>
        <a href="{{ route('faq-categorie.index') }}" class="btn btn-secondary">Annuleren</a>
    </form>
</div>
@endsection