@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-10 text-white">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Laatste Nieuwtjes 📰</h1>
        <a href="{{ route('nieuws.create') }}"
           class="bg-blue-600 hover:bg-blue-800 text-white px-4 py-2 rounded shadow transition-all">
            + Nieuw nieuwsitem
        </a>
    </div>
        <a href="{{ route('homepage') }}"
        class="inline-block mb-4 bg-gray-700 hover:bg-gray-900 text-white px-4 py-2 rounded shadow">
        🏠 Terug naar Home
        </a>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @forelse ($nieuws as $item)
            <div class="bg-gray-800 rounded-lg overflow-hidden shadow hover:shadow-xl transition-all">
                @if($item->afbeelding)
                    <img src="{{ asset('storage/' . $item->afbeelding) }}" alt="Afbeelding"
                         class="w-full h-48 object-cover">
                @else
                    <div class="h-48 bg-gray-700 flex items-center justify-center text-gray-400 text-sm">
                        Geen afbeelding
                    </div>
                @endif

                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-1">{{ $item->titel }}</h2>
                    <p class="text-sm text-gray-400">{{ $item->publicatiedatum }}</p>
                    <p class="mt-2 text-sm">{{ Str::limit($item->inhoud, 100) }}</p>

                    <a href="{{ route('nieuws.show', $item) }}"
                       class="mt-4 inline-block text-blue-400 hover:underline">
                        Lees meer →
                    </a>
                </div>
            </div>
        @empty
            <p class="text-gray-400">Er zijn nog geen nieuwsitems beschikbaar.</p>
        @endforelse
    </div>
</div>
@endsection
