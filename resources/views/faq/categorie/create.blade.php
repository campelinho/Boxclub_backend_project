@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Nieuwe categorie toevoegen</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('faq-categorie.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="naam" class="form-label">Categorie naam</label>
            <input type="text" class="form-control" id="naam" name="naam" value="{{ old('naam') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Opslaan</button>
        <a href="{{ route('faq-categorie.index') }}" class="btn btn-secondary">Annuleren</a>
    </form>
</div>
@endsection
