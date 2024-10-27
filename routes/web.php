<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
#forcar https
if (env('APP_ENV') !== 'local') {
    URL::forceScheme('https');
}
#redirecionamento para tela inicial de login
Route::redirect('/', '/login');


Route::get('/usuario', [MovieController::class, 'index'])->name('user.index');

Route::get('/cadastrar-filme', [MovieController::class, 'create'])->name('create.movie');
Route::get('/editar-filme/{id}', [MovieController::class, 'edit'])->name('edit.movie');
Route::get('/perfil', [UserController::class, 'showProfile'])->name('profile');
Route::post('/cadastrar-filme', [MovieController::class, 'store'])->name('store.movie');
Route::delete('/excluir-filmes/{id}', [MovieController::class, 'destroy'])->name('delete.movie');
Route::put('/update/{id}', [MovieController::class, 'update'])->name('update.movie');
Route::put('usuario/update/{id}', [UserController::class, 'update'])->name('update.user');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/cadastro', [RegisterController::class, 'showRegistrationForm'])->name('registerPage');
Route::post('/cadastro', [RegisterController::class, 'register'])->name('registerForm');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('loginPage');
Route::post('/login', [LoginController::class, 'login'])->name('loginForm');
Route::delete('/usuario/delete/{id}', [RegisterController::class, 'delete'])->name('deleteUser');
Route::post('/alugar-filme/{movie}', [MovieController::class, 'rent_movie'])->name('rent.create');
Route::post('/devolver-filme/{movie}', [MovieController::class, 'return_movie'])->name('rent.destroy');

Route::get('/forgot-password', [
    LoginController::class,
    'forgotPassword'
])->middleware('guest')->name('password.forgot');

Route::post('/forgot-password', [
    LoginController::class,
    'sendResetToken'
])->middleware('guest')->name('password.sendResetToken');

Route::get('/reset-password/{token}', [
    LoginController::class,
    'resetPassword'
])->middleware('guest')->name('password.reset');

Route::post(
    'reset-password/{token}',
    [LoginController::class, 'updatePassword']
)->middleware('guest')->name('password.update');
