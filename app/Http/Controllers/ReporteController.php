<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Compra;
use App\Models\Cliente;
use App\Models\Local;
use App\Models\Producto;
use App\Models\Provehedor;
use App\Models\Empresa;
use App\Models\Tarifa;
use App\Models\User;
use App\Models\Venta;
use App\Models\Inventario;
use App\Models\Operacion;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;


class ReporteController extends Controller
{
    public function productos()
    {
        $empresa_id = Auth::user()->empresa_id;
        $empresa = Empresa::find($empresa_id);

        $categorias = Categoria::all();
        $productos = Producto::where('empresa_id',$empresa_id)
                            ->orderBy('nombre', 'asc')->get();

        return view('modulos.reportes.productos', compact('productos','categorias','empresa'));
    }

    public function inventarios()
    {
        $empresa_id = Auth::user()->empresa_id;
        $empresa = Empresa::find($empresa_id);

        $categorias = Categoria::all();
        $invs = Inventario::all();

        return view('modulos.reportes.inventarios', compact('invs','categorias','empresa'));
    }

    public function locales()
    {
        $empresa_id = Auth::user()->empresa_id;
        $empresa = Empresa::find($empresa_id);

        $locals = Local::where('empresa_id',$empresa_id)
                            ->orderBy('nombre', 'asc')->get();

        return view('modulos.reportes.locales', compact('locals','empresa'));
    }

    public function usuarios()
    {
        $empresa_id = Auth::user()->empresa_id;
        $empresa = Empresa::find($empresa_id);

        $users = User::where('empresa_id',$empresa_id)
                            ->orderBy('name', 'asc')->get();

        return view('modulos.reportes.usuarios', compact('users','empresa'));
    }

    public function provehedores()
    {
        $empresa_id = Auth::user()->empresa_id;
        $empresa = Empresa::find($empresa_id);

        $provs = Provehedor::where('empresa_id',$empresa_id)
                            ->orderBy('nombre', 'asc')->get();

        return view('modulos.reportes.provehedores', compact('provs','empresa'));
    }

    public function clientes()
    {
        $empresa_id = Auth::user()->empresa_id;
        $empresa = Empresa::find($empresa_id);

        $clientes = Cliente::where('empresa_id',$empresa_id)->orderBy('nombre', 'asc')->get();

        return view('modulos.reportes.clientes', compact('clientes','empresa'));
    }

    public function compras()
    {
        $empresa_id = Auth::user()->empresa_id;
        $empresa = Empresa::find($empresa_id);

        $compras = Compra::with('detalles','provehedor')->orderBy('fecha', 'asc')->get();

        return view('modulos.reportes.compras', compact('compras','empresa'));
    }

    public function centros()
    {
        $empresa_id = Auth::user()->empresa_id;
        $empresa = Empresa::find($empresa_id);

        $localId = Auth::user()->local_id;  
        $centro = Local::find($localId);  
    
        // Obtener los inventarios asignados al local del usuario  
        $invs = Inventario::where('local_id', $localId)  
                          ->get();  
    
        $locals = Local::all();  

        return view('modulos.reportes.centros', compact('invs', 'centro','empresa'));
    }

    public function tarifas()
    {
        $empresa_id = Auth::user()->empresa_id;
        $empresa = Empresa::find($empresa_id);

    //    $localId = Auth::user()->local_id;  
    //    $centro = Local::find($localId);  
    
        // Obtener los inventarios asignados al local del usuario  
        $tarifas = Tarifa::all();  
    
        return view('modulos.reportes.tarifas', compact('tarifas','empresa'));
    }


    public function ventas()
    {
        $empresa_id = Auth::user()->empresa_id;
        $empresa = Empresa::find($empresa_id);

        $localId = Auth::user()->local_id;  
        $centro = Local::find($localId);  
    
        $ventas = Venta::with('detalleVenta','cliente')
                        ->where('local_id',Auth::user()->local_id)
                        ->get();

        return view('modulos.reportes.ventas', compact('ventas', 'centro','empresa'));
    }

    public function ventasid($id)
    {
        $empresa_id = Auth::user()->empresa_id;
        $empresa = Empresa::find($empresa_id);

        $localId = Auth::user()->local_id;  
        $centro = Local::find($localId);  

        $operador = Auth::user()->name;

        $venta = Venta::with('detalleVenta','cliente')->findOrFail($id);


        return view('modulos.reportes.ventasid', compact('empresa','centro','venta','operador'));
    }

    public function opersid($id)
    {
        $empresa_id = Auth::user()->empresa_id;
        $empresa = Empresa::find($empresa_id);

        $localId = Auth::user()->local_id;  
        $centro = Local::find($localId);  

        $operador = Auth::user()->name;

        $oper = Operacion::with('tarifa','cliente')->findOrFail($id);


        return view('modulos.reportes.opersid', compact('empresa','centro','oper','operador'));
    }



}
