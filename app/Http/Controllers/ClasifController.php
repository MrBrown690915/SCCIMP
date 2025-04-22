<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Medida;
use Illuminate\Http\Request;

class ClasifController extends Controller
{
    public function clasif()
    {
        $categorias = Categoria::orderBy('nombre', 'asc')->get();
        $medidas = Medida::orderBy('nombre', 'asc')->get();
        
        return view('modulos.productos.clasif', compact('categorias','medidas'));
    }
}
