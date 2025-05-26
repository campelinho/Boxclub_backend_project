@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $nieuw->titel }}</h2>
    <p class="text-muted">Geplaatst op {{ $nieuw->publicatiedatum }}</p>

    @if ($nieuw->afbeelding)
        <div class="mb-3">
            <img src="{{ asset('storage/' . $nieuw->afbeelding) }}" alt="afbeelding" class="img-fluid" style="max-width: 600px;">
        </div>
    @endif

    <p>{!! nl2br(e($nieuw->inhoud)) !!}</p>

    <a href="{{ route('nieuws.index') }}" class="btn btn-secondary mt-3">← Terug naar nieuwsoverzicht</a>
</div>
@auth
    <a href="{{ route('nieuws.edit', $nieuw->id) }}" class="btn btn-warning">Bewerken</a>

    <form action="{{ route('nieuws.destroy', $nieuw->id) }}" method="POST" class="d-inline"
          onsubmit="return confirm('Weet je zeker dat je dit nieuwsitem wilt verwijderen?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Verwijderen</button>
    </form>
@endauth

@endsection
