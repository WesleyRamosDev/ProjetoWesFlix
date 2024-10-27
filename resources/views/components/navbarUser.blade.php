<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color: #212529 !important;">
    <div class="container-fluid px-4 px-lg-5">
        <a class="navbar-brand" href="#">
            <img src="assets/images/movie_club_logo.svg" alt="Logo do Movie Club">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon text-light"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav gap-5 align-items-center">
                <li class="nav-item">
                    <a class="nav-link active text-white fw-bold" aria-current="page" href="/usuario">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white fw-bold" href="/usuario#catalogo">Catálogo de filmes</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white fw-bold" href="/usuario#meusFilmes">Filmes alugados</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-flex gap-1" href="/perfil" data-toggle="tooltip" data-placement="bottom" title="Editar Perfil">
                        <span class="nav-link text-white fw-bold">Bem vindo, {{ Auth::user()->name }}</span>
                        <img class="img-fluid" src="assets/images/person-fill.svg" alt="Ícone de usuário">
                    </a>
                </li>

                <li class="nav-item">
                    <button type="button" class="btn btn-primary fw-bold border-0" data-toggle="modal"
                        data-target="#exitModal" style="background: #4248F2 !important">
                        Sair
                    </button>
                    <div class="modal fade" id="exitModal" tabindex="-1" role="dialog" aria-labelledby="exitModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exitModalLabel"> Sair da sua conta</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p> Tem certeza que deseja sair? </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Cancelar</button>
                                    <a href="/logout" class="btn btn-danger" role="button">Sair</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
</nav>