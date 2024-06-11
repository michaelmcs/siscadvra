<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use Illuminate\Support\Facades\Hash;
use DB;

class CursoController extends Controller
{
    public function getCursos(Request $request) {
        $term = $request->buscar;

        $cursos = DB::table('cursos as c')
        ->select(
            'c.curso_id',
            'c.curso_codigo',
            'c.curso_nombre',
            'c.curso_ht',
            'c.curso_hp',
            'c.curso_totalh',
            'c.curso_credito',
            'c.curso_areac',
            'c.curso_ciclox',
            'c.curso_cicloss',
            'c.curso_ciclos',
            'c.curso_ciclo',
            'c.curso_plan',
            'c.curso_planxs',
            'c.curso_tipo',
            'c.curso_pre',
            'c.curso_hvir',
            'c.prog_id',
            'c.estado',
            'c.esp_ing',
            'c.curso_alter',
            'c.tipo_alter_salud',
            'c.curso_add',
            'c.curso_update'
        )
        ->where(function ($query) use ($term) {
            $query->orWhere('c.curso_codigo', 'LIKE', '%' . $term . '%')
                ->orWhere('c.curso_nombre', 'LIKE', '%' . $term . '%')
                ->orWhere('c.curso_areac', 'LIKE', '%' . $term . '%')
                ->orWhere('c.curso_tipo', 'LIKE', '%' . $term . '%')
                ->orWhere('c.curso_plan', 'LIKE', '%' . $term . '%');
        })
        ->get();

        $response = [
            'estado' => true,
            'datos' => $cursos
        ];

        return response()->json($response, 200);
    }

}
