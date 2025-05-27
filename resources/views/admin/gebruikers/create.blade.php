@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 max-w-lg">
    <h1 class="text-2xl font-bold mb-4">Nieuwe gebruiker toevoegen</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.gebruikers.store') }}">
        @csrf

        <div class="mb-4">
            <label for="name" class="block mb-1">Naam</label>
            <input type="text" name="name" id="name"
                   class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block mb-1">E-mailadres</label>
            <input type="email" name="email" id="email"
                   class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="password" class="block mb-1">Wachtwoord</label>
            <input type="password" name="password" id="password"
                   class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="inline-flex items-center">
                <input type="checkbox" name="is_admin" class="mr-2">
                Admin rechten geven
            </label>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">
            Gebruiker opslaan
        </button>
    </form>
</div>
@endsection
