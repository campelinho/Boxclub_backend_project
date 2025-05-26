@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Nieuwsitem bewerken</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('nieuws.update', $nieuw->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="titel" class="form-label">Titel</label>
            <input type="text" class="form-control" id="titel" name="titel" value="{{ old('titel', $nieuw->titel) }}" required>
        </div>

        <div class="mb-3">
            <label for="inhoud" class="form-label">Inhoud</label>
            <textarea class="form-control" id="inhoud" name="inhoud" rows="5" required>{{ old('inhoud', $nieuw->inhoud) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="publicatiedatum" class="form-label">Publicatiedatum</label>
            <input type="date" class="form-control" id="publicatiedatum" name="publicatiedatum" value="{{ old('publicatiedatum', $nieuw->publicatiedatum) }}" required>
        </div>

        <div class="mb-3">
            <label for="afbeelding" class="form-label">Nieuwe afbeelding (optioneel)</label>
            <input type="file" class="form-control" id="afbeelding" name="afbeelding">
            @if ($nieuw->afbeelding)
                <div class="mt-2">
                    <p>Huidige afbeelding:</p>
                    <img src="{{ asset('storage/' . $nieuw->afbeelding) }}" alt="afbeelding" width="200">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Bijwerken</button>
        <a href="{{ route('nieuws.index') }}" class="btn btn-secondary">Annuleren</a>
    </form>
</div>
@endsection
