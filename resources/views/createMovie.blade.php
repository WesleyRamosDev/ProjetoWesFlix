@extends('layouts.appAdm')

@section('content')
<div class="container-fluid d-flex flex-column gap-5 px-4 px-lg-5 py-5" style="background: #1E1E1E">
    <div class="d-flex gap-2 align-items-center">
        <img src="assets/images/ph_pencil-circle-light.svg" alt="Ícone de lápis">
        <h1 class="text-white m-0">Cadastro de filmes</h1>
    </div>

    {{-- Por padrão esses alerts estão com display: none --}}
    <div class="alert alert-success d-none" role="alert" id="successAlert">
        Filme cadastrado com sucesso!
    </div>

    @if(isset($errors) && count($errors)>0)
    <div id="alertContainer">
        <div class="alert alert-danger alert-dismissible d-none" role="alert" id="errorAlert">
            Por favor, preencha todos os campos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif


    <div class="row d-flex flex-column flex-lg-row gap-5 gap-lg-0">
        <div class="col-12 col-lg-8">
            <form class="row g-3" id="movieForm" method="POST" action="/cadastrar-filme" enctype="multipart/form-data">
            @csrf
                <div class="col-md-6">
                  <label for="title" class="form-label" style="color: #fff;">Título</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Digite o título do filme" required>
                </div>

                <div class="col-md-6">
                    <label for="gender_movie" class="form-label" style="color: #fff;">Gênero</label>
                    <select id="gender_movie" name="gender_movie" class="form-select" required>
                      <option selected>Escolha...</option>
                      <option>Ação</option>
                      <option>Aventura</option>
                      <option>Comédia</option>
                      <option>Comédia romântica</option>
                      <option>Documentário</option>
                      <option>Drama</option>
                      <option>Espionagem</option>
                      <option>Faroeste</option>
                      <option>Fantasia</option>
                      <option>Ficção científica</option>
                      <option>Mistério</option>
                      <option>Musical</option>
                      <option>Policial</option>
                      <option>Romance</option>
                      <option>Terror</option>
                    </select>
                </div>

                <div>
                    <label for="description" class="form-label" style="color: #fff;">Descrição</label>
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Digite a descrição do filme" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label" style="color: #fff;">Imagem de capa do filme</label>
                    <input class="form-control" type="file" id="image" name="image" onchange="loadFile(event)" required>
                </div>

                <div class="col-12 d-flex gap-4">
                  <button type="submit" class="btn btn-primary">Cadastrar filme</button>
                  <button type="submit" class="btn btn-danger" onclick="resetForm()">Limpar formulário</button>
                </div>
            </form>
        </div>

        <div class="col-12 col-lg-4">
            <img src="assets/images/preview_img.svg" id="movieImage" class="img-fluid" style="height: auto; width: 100%;" alt="imagem do filme">
        </div>
    </div>
</div>

<script>
    var loadFile = function(event) {
      var image = document.getElementById('movieImage');
      image.src = URL.createObjectURL(event.target.files[0]);
    };

    var resetForm = function() {
      document.getElementById('movieForm').reset();
      document.getElementById('movieImage').src = 'assets/images/preview_img.svg';
    };


    var showAlert = function(message, type) {
        var alertContainer = document.getElementById('alertContainer');
        alertContainer.classList.remove('d-none');
        alertContainer.innerHTML = `
            <div class="alert alert-${type} alert-dismissible fade show" role="alert">
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `;
    };

    document.getElementById('errorAlert').addEventListener('closed.bs.alert', function () {
        document.getElementById('alertContainer').classList.add('d-none');
    });
</script>

@endsection
