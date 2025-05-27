@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Gebruikersbeheer</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.gebruikers.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
        Nieuwe gebruiker toevoegen
    </a>

    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead class="bg-gray-200">
            <tr>
                <th class="border px-4 py-2">Naam</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Rol</th>
                <th class="border px-4 py-2">Actie</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gebruikers as $gebruiker)
                <tr>
                    <td class="border px-4 py-2">{{ $gebruiker->name }}</td>
                    <td class="border px-4 py-2">{{ $gebruiker->email }}</td>
                    <td class="border px-4 py-2">
                        {{ $gebruiker->is_admin ? 'Admin' : 'Gebruiker' }}
                    </td>
                    <td class="border px-4 py-2">
                        <form action="{{ route('admin.gebruikers.toggle', $gebruiker) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="bg-gray-800 text-white px-3 py-1 rounded">
                                {{ $gebruiker->is_admin ? 'Admin verwijderen' : 'Maak Admin' }}
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
