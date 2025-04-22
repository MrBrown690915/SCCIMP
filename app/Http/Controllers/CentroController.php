<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Producto;
use App\Models\Local;
use App\Models\Categoria;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CentroController extends Controller
{
    public function index()
    {
        $localId = Auth::user()->local_id;  
        $centro = Local::find($localId);  
    
        // Obtener los inventarios asignados al local del usuario  
        $invs = Inventario::where('local_id', $localId)  
                          ->get();  
    
        $locals = Local::all();  
    
        // Retornar la vista con los artículos  
        return view('modulos.inventarios.centros', compact('invs', 'centro'));      
    }
}
