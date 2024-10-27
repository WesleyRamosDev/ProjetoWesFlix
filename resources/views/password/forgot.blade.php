@extends('layouts.authentication')
@section('title', 'Redefinir Senha')
@section('content')

<div class="container d-flex flex-column justify-content-center align-items-center" style="min-height: 70vh; gap: 32px">
    <div class="text-center" style="width: 360px">
        <h1 style="color: #FFFFFF; font-size: 32px; font-family: 'Inter', sans-serif; font-weight: 400">Redefina sua senha</h1>
        <p style="color: #FFFFFF; font-size: 16px; font-family: 'Inter', sans-serif; font-weight: 200">Enviar o link de redefinição para o email</p>
    </div>
    @if ($errors->any())
        <div>
            <ul  class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                    <li>&#x2716; {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @elseif ($email) 
        <div> 
            <ul class="alert alert-success" role="alert">
                <li>&#x2714 Link enviado com sucesso!</li>
            </ul>
        </div>
    @endif
    <div class="col-md-6 register d-flex justify-content-center ">
        <form action="{{ route('password.sendResetToken') }}" method='POST' style="width: 360px">
        @csrf
            <div class="form-group">
                <div class="mb-2">
                    @if ($errors->any())
                        <label class="text-white" for="email" value="{{ $email }}">Email <span style="color: #DC3545">*</span></label>
                    @else
                        <label class="text-white" for="email">Email <span style="color: #DC3545">*</span></label>
                    @endif
                </div>
                <div class="mb-2">
                    <input type="email" id="email" name="email" placeholder="Insira seu email" style="width: 360px" required>
                </div>
            </div>      
                <button type="submit" class="btn btn-primary" style="background: #4248F2; width: 360px; height: 38px">ENVIAR LINK</button>
        </form>
    </div>
    <div class="d-flex justify-content-center align-items-center mt-3 w-100">
        <div class="d-flex justify-content-between align-items-center" style="width: 360px;">
            <i class="bi bi-chevron-compact-left fs-2 text-white" style="margin-right: 4.5em;"></i>
            <div class="carousel-indicators" style="margin-bottom: 14vh;">
                <button type="button" data-bs-target="#" data-bs-slide-to="0" aria-current="true" class="active" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#" data-bs-slide-to="1" aria-label="Slide 2"></button>
            </div>
            <i class="bi bi-chevron-compact-right fs-2 text-white" style="margin-left: 4em;"></i>
        </div>
    </div>
</div>

@endsection

