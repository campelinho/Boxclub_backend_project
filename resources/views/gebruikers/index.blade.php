@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10 space-y-6">
    <h1 class="text-3xl font-bold mb-4">Gebruikersbeheer 👥</h1>

    <table class="min-w-full bg-gray-800 text-white rounded shadow">
        <thead class="bg-gray-700">
            <tr>
                <th class="py-2 px-4 text-left">Naam</th>
                <th class="py-2 px-4 text-left">Email</th>
                <th class="py-2 px-4 text-left">Rol</th>
                <th class="py-2 px-4">Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gebruikers as $gebruiker)
                <tr class="border-b border-gray-700">
                    <td class="py-2 px-4">{{ $gebruiker->name }}</td>
                    <td class="py-2 px-4">{{ $gebruiker->email }}</td>
                    <td class="py-2 px-4">
                        {{ $gebruiker->is_admin ? 'Admin' : 'Gebruiker' }}
                    </td>
                    <td class="py-2 px-4 space-x-2 text-center">
                        @if(auth()->user()->id !== $gebruiker->id)
                            @if($gebruiker->is_admin)
                                <form action="{{ route('gebruikers.demote', $gebruiker) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button class="bg-yellow-600 hover:bg-yellow-700 text-white px-3 py-1 rounded">
                                        ⬇ Demote
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('gebruikers.promote', $gebruiker) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded">
                                        ⬆ Promote
                                    </button>
                                </form>
                            @endif
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
