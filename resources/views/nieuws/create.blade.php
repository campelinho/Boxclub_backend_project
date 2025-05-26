@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Nieuw nieuwsitem toevoegen</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('nieuws.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="titel" class="form-label">Titel</label>
            <input type="text" class="form-control" id="titel" name="titel" value="{{ old('titel') }}" required>
        </div>

        <div class="mb-3">
            <label for="inhoud" class="form-label">Inhoud</label>
            <textarea class="form-control" id="inhoud" name="inhoud" rows="5" required>{{ old('inhoud') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="publicatiedatum" class="form-label">Publicatiedatum</label>
            <input type="date" class="form-control" id="publicatiedatum" name="publicatiedatum" value="{{ old('publicatiedatum') }}" required>
        </div>

        <div class="mb-3">
            <label for="afbeelding" class="form-label">Afbeelding (optioneel)</label>
            <input type="file" class="form-control" id="afbeelding" name="afbeelding">
        </div>

        <button type="submit" class="btn btn-success">Opslaan</button>
        <a href="{{ route('nieuws.index') }}" class="btn btn-secondary">Annuleren</a>
    </form>
</div>
@endsection
