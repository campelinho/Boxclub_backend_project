@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Laatste nieuwtjes</h2>

    @auth
        <a href="{{ route('nieuws.create') }}" class="btn btn-primary mb-3">Nieuw nieuwsitem toevoegen</a>
    @endauth

    @foreach ($nieuws as $item)
        <div class="mb-4 border-bottom pb-3">
            <h4>{{ $item->titel }}</h4>
            <small>Geplaatst op {{ $item->publicatiedatum }}</small>
            @if ($item->afbeelding)
                <div>
                    <img src="{{ asset('storage/' . $item->afbeelding) }}" alt="afbeelding" width="200">
                </div>
            @endif
            <p>{{ \Illuminate\Support\Str::limit($item->inhoud, 150) }}</p>
            <a href="{{ route('nieuws.show', $item->id) }}">Lees meer</a>
        </div>
    @endforeach
</div>
@endsection
