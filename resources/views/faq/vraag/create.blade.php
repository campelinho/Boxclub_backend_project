@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Nieuwe vraag toevoegen</h1>

    <form action="{{ route('vraag.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700">Vraag:</label>
            <input type="text" name="vraag" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Antwoord:</label>
            <textarea name="antwoord" class="w-full border rounded px-3 py-2" rows="5" required></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Categorie:</label>
            <select name="categorie_id" class="w-full border rounded px-3 py-2" required>
                @foreach ($categorieën as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->naam }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Opslaan</button>
    </form>
</div>
@endsection
