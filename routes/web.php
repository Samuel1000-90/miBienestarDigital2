<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route; // Add this line
use App\Http\Controllers\ReporteController;

Route::get('/admin/reportes', [ReporteController::class, 'index'])->name('admin.reportes');


Route::get('/admin/panel', [AdminController::class, 'index'])->name('admin.panel');


// Mostrar el formulario de login
Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');

// Procesar el login
Route::post('/admin/login', function (Request $request) {
    $email = $request->input('email');
    $password = $request->input('password');

    // credenciales del administrador (puedes cambiarlas)
    $adminEmail = 'admin@bienestardigital.com';
    $adminPass = 'admin123';

    if ($email === $adminEmail && $password === $adminPass) {
        session(['admin_logged_in' => true]);
        return redirect('/admin/dashboard');
    } else {
        return back()->with('error', 'Correo o contraseña incorrectos');
    }
});

// Panel del administrador (solo si está logueado)
Route::get('/admin/dashboard', function () {
    if (!session('admin_logged_in')) {
        return redirect('/admin/login')->with('error', 'Debes iniciar sesión.');
    }
    return view('admin.dashboard');
})->name('admin.dashboard');

// Cerrar sesión
Route::get('/admin/logout', function () {
    session()->forget('admin_logged_in');
    return redirect('/admin/login')->with('success', 'Sesión cerrada correctamente.');
});
