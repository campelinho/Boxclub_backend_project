@extends('layouts.app')

@section('content')
<div class="container">
    <h2>FAQ Categorieën</h2>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <a href="{{ route('faq-categorie.create') }}" class="btn btn-primary mb-3">Nieuwe categorie toevoegen</a>

    @if ($categorieën->count())
        <table class="table">
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorieën as $categorie)
                    <tr>
                        <td>{{ $categorie->naam }}</td>
                        <td>
                            <a href="{{ route('faq-categorie.edit', $categorie->id) }}" class="btn btn-warning btn-sm">Bewerken</a>

                            <form action="{{ route('faq-categorie.destroy', $categorie->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Weet je zeker dat je deze categorie wilt verwijderen?');">
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
        <p>Er zijn nog geen categorieën.</p>
    @endif
</div>
@endsection
