<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password as PasswordRules;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        if (auth()->user()) {
            $user = auth()->user();
            return $user->is_admin ? redirect(route('user.index')) : redirect(route('create.movie'));
        }
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            if (auth()->user()) {
                return redirect('/usuario');
            }
        }
        return back()->withErrors([
            'email' => 'E-mail ou senha incorretos.',
        ]);
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }

    public function forgotPassword()
    {
        return view('password.forgot', [
            'status' => null,
            'email' => null,
            'error' => null,
        ]);
    }

    public function sendResetToken(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.exists' => 'Email inválido.',
        ]);

        if (!$request->email) {
            return back()->withErrors([
                'token' => 'E-mail inválido.',
            ]);
        }

        $status = Password::sendResetLink(
            $request->only('email')
        );

        $result = [
            'status' => $status,
            'email' => $request->email,
            'error' => $status === Password::RESET_LINK_SENT ? null : $status,
        ];

        return view('password.forgot', $result);
    }

    public function resetPassword(Request $request, $token)
    {
        return view('password.reset', ['token' => $token]);
    }

    public function updatePassword(Request $request)
    {
        $request->only([
            'password',
            'password_confirmation',
            'token',
            'email'
        ]);

        $request->validate(
            [
                // os padrões de validação de senha são definidos em app/Providers/AppServiceProvider.php
                'password' => ['required', 'confirmed', PasswordRules::defaults()],
                'password_confirmation' => 'required',
                'token' => 'required',
            ],
            [
                'password.required' => 'O campo senha é obrigatório',
                'password.confirmed' => 'As senhas informadas não são iguais',
                'password.min' => 'A senha informada deve ter no mínimo 6 caracteres',
                'password.max' => 'A senha informada deve ter no máximo 64 caracteres',
                'password.numbers' => 'A senha informada deve conter números',
                'password.uncompromised' => 'A senha informada foi comprometida em um vazamento de dados',
            ]
        );

        if (!$request->email) {
            return back()->withErrors([
                'token' => 'Token inválido.',
            ]);
        }

        $status = Password::reset(
            $request->only('password', 'password_confirmation', 'token') + ['email' => $request->email],
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => bcrypt($password),
                ]);
                // Invalida 'remember me' tokens
                $user->setRememberToken(Str::random(60));
                $user->save();

                // Notifica o usuário sobre a alteração de senha
                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            DB::table('password_reset_tokens')
                ->where('email', $request->email)
                ->delete();
        }

        return $status === Password::PASSWORD_RESET
            ? redirect('/login')->with('status', 'Senha alterada com sucesso.')
            : back()->withErrors([
                'password' => 'Erro ao alterar a senha.',
            ]);

    }

}
