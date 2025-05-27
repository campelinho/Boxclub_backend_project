@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-gray-800 p-6 rounded shadow text-white">
    <h1 class="text-2xl font-bold mb-6">Nieuwe Vraag Toevoegen ❓</h1>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-600 text-white rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('vraag.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="vraag" class="block mb-1 font-semibold">Vraag</label>
            <input type="text" name="vraag" id="vraag" class="w-full px-4 py-2 rounded bg-gray-900 text-white border border-gray-700 focus:outline-none focus:ring focus:border-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="antwoord" class="block mb-1 font-semibold">Antwoord</label>
            <textarea name="antwoord" id="antwoord" rows="4" class="w-full px-4 py-2 rounded bg-gray-900 text-white border border-gray-700 focus:outline-none focus:ring focus:border-blue-500" required></textarea>
        </div>

        <div class="flex justify-between items-center">
            <button type="submit" class="bg-green-600 hover:bg-green-800 text-white px-4 py-2 rounded shadow">
                Opslaan
            </button>
            <a href="{{ route('faq.publiek') }}" class="text-blue-400 hover:underline">← Terug naar FAQ</a>
        </div>
    </form>
</div>
@endsection
