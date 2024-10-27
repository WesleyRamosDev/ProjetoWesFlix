@extends('layouts.appUser')

@section('content')
    <div class="container-fluid d-flex flex-column gap-5 px-4 px-lg-5 py-5" style="background: #1E1E1E">

        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-center gap-4 gap-lg-0">
            <div class="d-flex gap-2 align-items-center" id="catalago">
                <img src="assets/images/icon-park-outline_movie.svg" alt="Ícone de filme">
                <h1 class="text-white m-0">Catálogo de filmes</h1>
            </div>
        </div>

        <div class="d-flex gap-5 flex-wrap justify-content-center">

            @foreach ($movie as $movies)
                <x-movie-card-user :movie="$movies" />
            @endforeach

        </div>

        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-center gap-4 gap-lg-0">
            <div class="d-flex gap-2 align-items-center" id="meusFilmes">
                <img src="assets/images/mdi_movie-open-star-outline.svg" alt="Ícone de Claquete">
                <h1 class="text-white m-0">Seus Filmes</h1>
            </div>
        </div>
        <div class="d-flex gap-5 flex-wrap justify-content-center">
            @foreach (Auth::user()->movies_renting()->get() as $movie)
                <x-movie-card-user-rented :movie="$movie" />
            @endforeach

        </div>

    </div>
@endsection
