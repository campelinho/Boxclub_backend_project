@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Veelgestelde Vragen (FAQ)</h2>

    @foreach ($categorieën as $categorie)
        <h4 class="mt-4">{{ $categorie->naam }}</h4>
        <ul class="list-group mb-3">
            @forelse ($categorie->vragen as $vraag)
                <li class="list-group-item">
                    <strong>{{ $vraag->vraag }}</strong>
                    <p class="mb-0">{{ $vraag->antwoord }}</p>
                </li>
            @empty
                <li class="list-group-item">Geen vragen in deze categorie.</li>
            @endforelse
        </ul>
    @endforeach
</div>
@endsection
