@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Veelgestelde vragen</h1>

    <a href="{{ route('vraag.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
    Nieuwe vraag toevoegen
</a>


    <table class="table-auto w-full mt-4">
        <thead>
            <tr>
                <th class="px-4 py-2">Vraag</th>
                <th class="px-4 py-2">Categorie</th>
                <th class="px-4 py-2">Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vragen as $vraag)
                <tr>
                    <td class="border px-4 py-2">{{ $vraag->vraag }}</td>
                    <td class="border px-4 py-2">{{ $vraag->categorie->naam }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('vraag.edit', $vraag->id) }}" class="text-blue-500">Bewerken</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
