@extends('layouts.authentication')
@section('title', 'Entrar no Wesflix')
@section('content')

    <div class="container d-flex flex-column justify-content-center align-items-center" style="min-height: 70vh; gap: 32px">
        <div class="text-center" style="width: 360px">
            <h1 style="color: #FFFFFF; font-size: 32px; font-family: 'Inter', sans-serif; font-weight: 600">
                Entre na sua conta
            </h1>
            <p style="color: #B0B0B0; font-size: 16px; font-family: 'Inter', sans-serif; font-weight: 300">
                Bem-vindo de volta!
            </p>
        </div>

        <!-- Mensagem de senha incorreta -->
        @if ($errors->any())
            <div style="width: 360px">
                <ul style="padding-left: 0 !important">
                    @foreach ($errors->all() as $error)
                        <li class="alert alert-danger" role="alert" style="border-radius: 5px; font-size: 14px">
                            &#9888; {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="col-md-6 register d-flex justify-content-center">
            <form action="/login" method='POST' style="width: 360px">
                @csrf
                <div class="form-group">
                    <div class="mb-2">
                        <label class="text-white" for="email">Email</label>
                    </div>
                    <div class="mb-2">
                        <input type="email" id="email" name="email" placeholder="Insira seu email"
                            style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #B0B0B0; background: #2C2C2C; color: #FFF; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);"
                            required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-2">
                        <label class="text-white" for="password">Senha</label>
                    </div>
                    <div class="mb-2">
                        <input type="password" id="password" name="password" placeholder="Senha"
                            style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #B0B0B0; background: #2C2C2C; color: #FFF; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);"
                            required>
                    </div>
                </div>
                <div style="margin-bottom: 15px; text-align: right;">
                    <a href="/forgot-password" style="color: #B0B0B0; text-decoration: none; font-size: 14px">Esqueceu a
                        senha?</a>
                </div>
                <button type="submit" class="btn btn-primary"
                    style="background: linear-gradient(90deg, #4248F2, #676AE6); border: none; width: 100%; height: 45px; border-radius: 8px; color: white; font-weight: 600; font-size: 16px; transition: background 0.3s ease;">
                    ENTRAR
                </button>
            </form>
        </div>

        <div style="margin-top: 16px;">
            <p style="color: #B0B0B0; font-size: 14px">Não tem uma conta?
                <a href="/cadastro" style="color: #4248F2; text-decoration: none; font-weight: 500">Cadastre-se</a>
            </p>
        </div>
    </div>

@endsection
