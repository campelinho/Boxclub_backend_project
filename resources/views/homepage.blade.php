@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col justify-center items-center bg-gray-900 text-white">
    <h1 class="text-4xl font-bold mb-4">Welkom bij BoxClub Brussels 🥊</h1>
    <p class="text-lg mb-8">Train mee, blijf in vorm en blijf op de hoogte van onze laatste nieuwtjes!</p>

    <div class="flex space-x-4">
        <a href="{{ route('nieuws.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-5 rounded-lg shadow">
            Bekijk Laatste Nieuwtjes
        </a>
        <a href="{{ route('faq.publiek') }}" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-5 rounded-lg shadow">
            Bekijk FAQ
        </a>
        <a href="{{ route('login') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-5 rounded-lg shadow">
            Login
        </a>
    </div>
</div>
@endsection