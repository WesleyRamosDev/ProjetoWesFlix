<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function showProfile()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect(route('loginPage'));
        }
        if ($user->is_admin) {
            return view('profileAdm');
        } else {
            return view('profileUser');
        }
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($user->id != Auth::id()) {
            return redirect(route('profile'))->with('error', 'Você não tem permissão para atualizar este usuário.');
        }
        $user->name = $request->name;
        $user->email = $request->email;
        try {
            $user->save();
            return redirect(route('user.index'));
        } catch (\Exception $e) {
            return redirect(route('perfil'))->with('error', 'Erro ao atualizar usuário');
        }
    }
}
