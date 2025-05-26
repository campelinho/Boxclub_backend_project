@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Nieuwe FAQ Vraag Toevoegen</h2>

    <form action="{{ route('faq-vraag.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="faq_categorie_id" class="form-label">Categorie</label>
            <select name="faq_categorie_id" id="faq_categorie_id" class="form-control" required>
                <option value="">-- Kies een categorie --</option>
                @foreach ($categorieën as $categorie)
                    <option value="{{ $categorie->id }}" {{ old('faq_categorie_id') == $categorie->id ? 'selected' : '' }}>
                        {{ $categorie->naam }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="vraag" class="form-label">Vraag</label>
            <input type="text" name="vraag" id="vraag" class="form-control" value="{{ old('vraag') }}" required>
        </div>

        <div class="mb-3">
            <label for="antwoord" class="form-label">Antwoord</label>
            <textarea name="antwoord" id="antwoord" class="form-control" rows="4" required>{{ old('antwoord') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Opslaan</button>
        <a href="{{ route('faq-vraag.index') }}" class="btn btn-secondary">Annuleren</a>
    </form>
</div>
@endsection
