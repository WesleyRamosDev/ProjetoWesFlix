@extends('layouts.authentication')
@section('title', 'Redefinir Senha')
@section('content')

<div class="container d-flex flex-column justify-content-center align-items-center" style="min-height: 70vh; gap: 32px">
    <div class="text-center" style="width: 360px">
        <h1 style="color: #FFFFFF; font-size: 32px; font-family: 'Inter', sans-serif; font-weight: 400">Redefina sua senha</h1>
        <p style="color: #FFFFFF; font-size: 16px; font-family: 'Inter', sans-serif; font-weight: 200">Cria uma nova senha</p>
    </div>
    @if ($errors->any())
        <div>
            <ul  class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                    <li>&#x2716; {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="col-md-6 register " style="position: relative; z-index: 0;">
        <form action="{{ route('password.reset', ['token' => $token]) }}" method='POST' style="width: 360px; margin: auto;">
            @csrf
            <div class="form-group" id="reset-form">
                <div class="mb-2">
                    <input type="hidden" name="token" value="{{ $token }}">
                </div>
                <div class="mb-2">
                    <input type="hidden" name="email" value="{{ $_GET['email'] }}">
                </div>
                <div class="mb-2">
                    <label class="text-white" for="password">Senha <span style="color: #DC3545">*</span></label>
                </div>
                <div class="mb-2">
                    <input type="password" id="password" name="password" placeholder="Insira a sua nova senha" style="width: 100%;">
                </div>
                <div class="mb-2">
                    <label class="text-white" for="password_confirmation">Confirmar senha <span style="color: #DC3545">*</span></label>
                </div>
                <div class="mb-2">
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirme a sua nova senha" style="width: 360px;">
                </div>
                
            </div>
            <button type="submit" class="btn btn-primary" style="background: #4248F2; width: 360px; height: 38px; margin-top: 2em;">ENVIAR SENHA</button>
        </form>
        <div class="d-flex justify-content-center align-items-center mt-4 w-100">
            <div class="d-flex justify-content-between align-items-center" style="width: 360px;">
                <i class="bi bi-chevron-compact-left fs-2 text-white" style="margin-right: 4.5em;"></i>
                <div class="carousel-indicators" style="margin-bottom: 2.5vh;">
                    <button type="button" data-bs-target="#" data-bs-slide-to="0" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#" data-bs-slide-to="1" class="active" aria-label="Slide 2"></button>
                </div>
                <i class="bi bi-chevron-compact-right fs-2 text-white" style="margin-left: 4em;"></i>
            </div>
        </div>
    </div>
</div>

@endsection

