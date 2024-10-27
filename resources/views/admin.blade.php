@extends('layouts.appAdm')

@section('content')
    <div class="container-fluid d-flex flex-column gap-5 px-4 px-lg-5 py-5" style="background: #1E1E1E">

        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-center gap-4 gap-lg-0">
            <div class="d-flex gap-2 align-items-center" id="catalogo">
                <img src="assets/images/icon-park-outline_movie.svg" alt="Ícone de filme">
                <h1 class="text-white m-0">Catálogo de filmes</h1>
            </div>

            @if (session('message'))
                <div class="alert alert-success d-none" role="alert" id="successAlert">
                    <p>{{ session('message') }}</p>
                </div>
            @endif

            <a href="/cadastrar-filme" class="btn btn-primary" style="background: #4248F2 !important">Adicionar Filme +</a>
        </div>

        <div class="d-flex gap-5 flex-wrap justify-content-center">
            @foreach ($movie as $movies)
                <x-movieCard :movie="$movies" />
            @endforeach

            @foreach ($movie as $movies)
                <div class="modal fade" id="deleteModal_{{ $movies->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Excluir Filme</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p> Tem certeza que deseja excluir? </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <form action="{{ url('/excluir-filmes', $movies->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
@endsection
