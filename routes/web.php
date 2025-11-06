<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RutinaController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MetaController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Rutas públicas
|--------------------------------------------------------------------------
*/
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/', function () {
    return Auth::check() ? redirect('/dashboard') : redirect('/login');
});

/*
|--------------------------------------------------------------------------
| Rutas protegidas (requieren login)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('rutinas', RutinaController::class);
    Route::post('/rutinas/{rutina}/completar', [RutinaController::class, 'marcarCompletada'])->name('rutinas.completar');

    Route::resource('tareas', TareaController::class);
    Route::post('/tareas/{tarea}/completar', [TareaController::class, 'completar'])->name('tareas.completar');
    Route::get('/tareas-calendario', [TareaController::class, 'calendario'])->name('tareas.calendario');
    Route::get('/tareas-vencidas', [TareaController::class, 'vencidas'])->name('tareas.vencidas');

    Route::get('/perfil', [PerfilController::class, 'show'])->name('perfil.show');
    Route::get('/perfil/editar', [PerfilController::class, 'edit'])->name('perfil.edit');
    Route::put('/perfil', [PerfilController::class, 'update'])->name('perfil.update');

    Route::resource('metas', MetaController::class);
    Route::post('metas/{meta}/progreso', [MetaController::class, 'updateProgreso'])->name('metas.progreso');
});

/*
|--------------------------------------------------------------------------
| Rutas del Administrador
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/panel', [AdminController::class, 'admin_panel'])->name('admin.panel');
    Route::get('/admin/usuario', [AdminController::class, 'admin_usuario'])->name('admin.usuario');
    Route::get('/admin/gestion', [AdminController::class, 'admin_gestionUsuario'])->name('admin.gestion');
    Route::get('/admin/administrador', [AdminController::class, 'administrador'])->name('admin.administrador');
});
