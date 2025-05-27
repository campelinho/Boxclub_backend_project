@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10 space-y-6">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold">Veelgestelde Vragen (FAQ)</h1>
    @auth
    <a href="{{ route('vraag.create') }}"
       class="bg-green-600 hover:bg-green-800 text-white px-4 py-2 rounded shadow">
        ➕ Nieuwe Vraag
    </a>
@endauth

    </div>

    @foreach ($categorieën as $categorie)
        <div class="bg-gray-800 p-6 rounded shadow">
            <h2 class="text-xl font-semibold mb-4">{{ $categorie->naam }}</h2>
            <div class="space-y-4">
                @foreach ($categorie->vragen as $vraag)
                    <div class="bg-gray-700 p-4 rounded">
                        <p class="font-semibold">❓ {{ $vraag->vraag }}</p>
                        <p class="mt-1 text-gray-300">💡 {{ $vraag->antwoord }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
@endsection
