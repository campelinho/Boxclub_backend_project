
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>FAQ Categorieën</h2>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <a href="{{ route('faq-categorie.create') }}" class="btn btn-primary mb-3">Nieuwe categorie toevoegen</a>

    @if ($categorieen->count())
        <table class="table">
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorieen as $categorie)
                    <tr>
                        <td>{{ $categorie->naam }}</td>
                        <td>
                            <a href="{{ route('faq-categorie.edit', $categorie) }}" class="btn btn-warning btn-sm">Bewerken</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Geen categorieën gevonden.</p>
    @endif
</div>
@endsection
