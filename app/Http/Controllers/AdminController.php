<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Habito;
use App\Models\Progreso;

class AdminController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        $habitos = Habito::all();
        $progresos = Progreso::all();

        return view('admin.panel', compact('usuarios', 'habitos', 'progresos'));
    }
}

