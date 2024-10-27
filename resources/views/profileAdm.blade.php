@extends('layouts.appAdm')

@section('content')
<div class="container-fluid d-flex flex-column gap-5 px-4 px-lg-5 py-5" style="background: #1E1E1E">
    <div class="d-flex gap-2 align-items-center">
        <img  src="{{ asset('assets/images/mdi_star-circle.svg')}}" alt="Ícone Estrela">
        <h1 class="text-white m-0">Meu Perfil</h1>
    </div>

    <div class="row d-flex flex-column flex-lg-row gap-4 gap-lg-0">
        <div class="col-12 col-lg-8">
            <form method='POST' action="{{ url('/usuario/update', Auth::user()->id) }}" class="row g-2" id="userForm">
                @csrf
                @method('PUT')
                <div class="col-md-7">
                  <label for="email" class="form-label" style="color: #fff;">Seu email:</label>
                  <input type="email" class="form-control" id="email" name='email' placeholder="Digite o seu email"   value="{{ Auth::user()->email }}" required>
                </div>

                <div class="col-md-7">
                    <label for="name" class="form-label" style="color: #fff;">Seu nome:</label>
                    <input type="text" class="form-control" id="name" name='name' placeholder="Digite o seu nome"   value="{{ Auth::user()->name }}" required>
                </div>


                <div class="col-12 d-flex gap-4">
                  <button type='submit' class="btn btn-primary" data-toggle="modal" data-target="#confirmModal" style="background: #4248F2 !important">Atualizar informações</button>
                  <a class="btn btn-danger" data-toggle="modal" data-target="#deleteProfileModal"> Excluir conta </a>
                  <a href="/usuario" class="btn btn-secondary" role="button">Cancelar</a>
                </div>
            </form>
        </div>

        <div class="col-12 col-lg-4">
            <img src="{{ asset('assets/images/user.svg')}}" class="img-fluid" style="height: 70%; width: 100%;" alt="User">
        </div>
    </div>
</div>

<!-- <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmModalTitle">Alterar informações de cadastro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Tem certeza que deseja alterar suas informações?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <a href="/usuario" class="btn btn-danger" role="button">Alterar</a>
      </div>
    </div>
  </div>
</div> -->

<div class="modal fade" id="deleteProfileModal" tabindex="-1" role="dialog" aria-labelledby="deleteProfileModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="deleteProfileModalLabel"> Excluir Conta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p> Tem certeza que deseja excluir sua conta? Essa ação não pode ser desfeita. </p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <form action="{{ url('/usuario/delete', Auth::user()->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

@endsection