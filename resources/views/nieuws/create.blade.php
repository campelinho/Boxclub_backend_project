@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-gray-800 text-white p-8 rounded shadow">
    <h1 class="text-2xl font-bold mb-6">Nieuw nieuwsitem toevoegen 📰</h1>

    <form method="POST" action="{{ route('nieuws.store') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
            <label for="titel" class="block text-sm font-medium text-white">Titel</label>
            <input type="text" name="titel" id="titel" class="mt-1 block w-full rounded border-gray-600 bg-gray-700 text-white focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <div>
            <label for="inhoud" class="block text-sm font-medium text-white">Inhoud</label>
            <textarea name="inhoud" id="inhoud" rows="5" class="mt-1 block w-full rounded border-gray-600 bg-gray-700 text-white focus:ring-blue-500 focus:border-blue-500" required></textarea>
        </div>

        <div>
            <label for="publicatiedatum" class="block text-sm font-medium text-white">Publicatiedatum</label>
            <input type="date" name="publicatiedatum" id="publicatiedatum" class="mt-1 block w-full rounded border-gray-600 bg-gray-700 text-white focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <div>
            <label for="afbeelding" class="block text-sm font-medium text-white">Afbeelding (optioneel)</label>
            <input type="file" name="afbeelding" id="afbeelding" class="mt-1 block w-full text-white">
        </div>

        <div class="flex justify-between">
            <button type="submit" class="bg-green-600 hover:bg-green-800 text-white px-6 py-2 rounded">
                Opslaan
            </button>
            <a href="{{ route('nieuws.index') }}" class="bg-gray-600 hover:bg-gray-800 text-white px-6 py-2 rounded">
                Annuleren
            </a>
        </div>
    </form>
</div>
@endsection
