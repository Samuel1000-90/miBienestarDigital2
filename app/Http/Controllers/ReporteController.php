<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
    public function index()
    {
        $reportes = DB::table('Habito')
            ->join('Usuario', 'Habito.id_usuario', '=', 'Usuario.id_usuario')
            ->select('Usuario.nombre_usuario', 'Habito.nombre_habito', 'Habito.progreso')
            ->get();

        return view('admin.reportes.index', compact('reportes'));
    }
}

