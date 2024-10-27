<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\User;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|min:2|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            # Os parâmetros padrão são definidos em app/Providers/AppServiceProvider.php
            'password' => ['required', Password::defaults()],
            // 'password_confirmation' => 'required',
        ], [
            # Laravel permite a definição de mensagens de erro personalizadas
            'name.required' => 'O campo nome é obrigatório',
            'name.min' => 'O nome informado deve ter no mínimo 2 caracteres',
            'name.max' => 'O nome informado deve ter no máximo 255 caracteres',
            'email.required' => 'O campo email é obrigatório',
            'email.email' => 'O email informado não é válido',
            'email.unique' => 'O email informado já está cadastrado no sistema',
            'email.max' => 'O email informado deve ter no máximo 255 caracteres',
            'password.required' => 'O campo senha é obrigatório',
            // 'password.confirmed' => 'As senhas informadas não são iguais',
            'password.min' => 'A senha informada deve ter no mínimo 6 caracteres',
            'password.max' => 'A senha informada deve ter no máximo 64 caracteres',
            'password.numbers' => 'A senha informada deve conter números',
            'password.uncompromised' => 'A senha informada foi comprometida em um vazamento de'
                . ' dados, por favor, informe outra senha',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->is_admin = False;

        $user->save();


        return redirect(route('loginPage'));
    }

    public function delete(Request $request)
    {
        $user_to_delete = null;
        $redirect = true;
        $user = $request->user();
        if (!$user) {
            return redirect('login');
        } elseif ($user->is_admin) {
            $redirect = $request->id != $user->id;
            $user_to_delete = User::where('id', $request->id)->first();
            if (!$user_to_delete) {
                return redirect()->back()->with('message', 'Usuário não encontrado.'); 
            }
        } elseif ($request->id != $user->id) {
            return redirect()->back()->with('message', 'Usuário não pode deletar outro usuário.'); 
        } else {
            $user_to_delete = $user;
        }
        $user_to_delete->delete();
        $request->session()->invalidate();
        return redirect('login');
    }
}
