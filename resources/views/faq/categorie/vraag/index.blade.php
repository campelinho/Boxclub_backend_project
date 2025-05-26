@extends('layouts.app')

@section('content')
<div class="container">
    <h2>FAQ Vragen</h2>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <a href="{{ route('faq-vraag.create') }}" class="btn btn-primary mb-3">Nieuwe vraag toevoegen</a>

    @if ($vragen->count())
        <table class="table">
            <thead>
                <tr>
                    <th>Vraag</th>
                    <th>Antwoord</th>
                    <th>Categorie</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vragen as $vraag)
                    <tr>
                        <td>{{ $vraag->vraag }}</td>
                        <td>{{ Str::limit($vraag->antwoord, 60) }}</td>
                        <td>{{ $vraag->categorie->naam }}</td>
                        <td>
                            <a href="{{ route('faq-vraag.edit', $vraag->id) }}" class="btn btn-warning btn-sm">Bewerken</a>
                            <form action="{{ route('faq-vraag.destroy', $vraag->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Weet je zeker dat je deze vraag wilt verwijderen?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Verwijderen</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Er zijn nog geen vragen toegevoegd.</p>
    @endif
</div>
@endsection
