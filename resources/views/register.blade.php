@extends('layouts.authentication')
@section('title', 'Cadastre-se no Wesflix')
@section('content')

    <div class="container d-flex flex-column justify-content-center align-items-center" style="min-height: 70vh; gap: 32px">
        <div class="text-center" style="width: 360px">
            <h1 style="color: #FFFFFF; font-size: 32px; font-family: 'Inter', sans-serif; font-weight: 400">Crie sua conta
            </h1>
            <p style="color: #FFFFFF; font-size: 16px; font-family: 'Inter', sans-serif; font-weight: 200">Seus filmes
                favoritos a um clique de distância</p>
        </div>
        <div class="col-md-6 register d-flex justify-content-center ">
            <form action="/cadastro" method='POST' style="width: 360px">
                @csrf
                <div class="form-group">
                    <div class="mb-2">
                        <label class="text-white" for="name" style="color: #FFFFFF">Nome <span
                                style="color: #DC3545">*</span></label>
                    </div>
                    <div class="mb-2">
                        <input type="text" id="name" name="name" placeholder="Insira seu nome"
                            style="width: 360px" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-2">
                        <label class="text-white" for="email">Email <span style="color: #DC3545">*</span></label>
                    </div>
                    <div class="mb-2">
                        <input type="email" id="email" name="email" placeholder="Insira seu email"
                            style="width: 360px" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-2">
                        <label class="text-white" for="password">Senha <span style="color: #DC3545">*</span></label>
                    </div>
                    <div class="mb-2">
                        <input type="password" id="password" name="password" placeholder="Senha" style="width: 360px"
                            required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" style="background: #4248F2; width: 360px; height: 38px">CRIAR
                    CONTA</button>
            </form>
        </div>
        <div>
            <p style="color: #FFFFFF">Já tem uma conta? <a href="/login">Entrar</a></p>
        </div>
        @if ($errors->any())
            <div>
                <ul class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error)
                        <li>&#x2716; {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

@endsection
