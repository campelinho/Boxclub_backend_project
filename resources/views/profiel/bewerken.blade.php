@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Profiel bewerken</h2>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('profiel.update') }}" enctype="multipart/form-data">

        @csrf

        <div class="mb-3">
            <label for="gebruikersnaam" class="form-label">Gebruikersnaam</label>
            <input type="text" class="form-control" id="gebruikersnaam" name="gebruikersnaam"
                value="{{ old('gebruikersnaam', $gebruiker->gebruikersnaam) }}">
        </div>

        <div class="mb-3">
            <label for="verjaardag" class="form-label">Verjaardag</label>
            <input type="date" class="form-control" id="verjaardag" name="verjaardag"
                value="{{ old('verjaardag', $gebruiker->verjaardag) }}">
        </div>

        <div class="mb-3">
            <label for="over_mij" class="form-label">Over mij</label>
            <textarea class="form-control" id="over_mij" name="over_mij" rows="3">{{ old('over_mij', $gebruiker->over_mij) }}</textarea>
        </div>
            <div class="mb-3">
        <label for="profielfoto" class="form-label">Profielfoto</label>
        <input type="file" class="form-control" id="profielfoto" name="profielfoto">

        @if ($gebruiker->profielfoto)
            <div class="mt-2">
                <img src="{{ asset('storage/' . $gebruiker->profielfoto) }}" alt="Profielfoto" width="120">
            </div>
        @endif
    </div>


        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
</div>
@endsection
