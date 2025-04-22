<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Arqueo;
use App\Models\MCaja;
use App\Models\Producto;
use App\Models\Provehedor;
use App\Models\tmpCompra;
use App\Models\detalleCompra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; 

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $openArq = Arqueo::whereNull('fecha_cierre')->first();

        $compras = Compra::with('detalles','provehedor')->orderBy('fecha', 'asc')->get();
        return view('modulos.compras.index', compact('compras','openArq'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $compra = new Compra();
        $productos = Producto::where('empresa_id',Auth::user()->empresa_id)
                            ->where('activo',1)->get();
        $provs = Provehedor::where('empresa_id',Auth::user()->empresa_id)->get();
        $total_cantidad = 0;
        $total_compra = 0;

        $session_id = session()->getId();
        $tmp_compras = TmpCompra::where('session_id',$session_id)->get();
        
        return view('modulos.compras.create', compact('productos','provs',
                    'tmp_compras','total_cantidad','total_compra'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //   $datos = request()->all();
    //   return response()->json($datos);

       $request->validate([
        'fecha' => 'required|date|before_or_equal:' . Carbon::today()->toDateString(),
        'comprobante' => 'required',
        'precio_total' => 'required',
    //    'provehedor_id' => 'required',
    ],[
        'comprobante.required' => "Ingrese el Comprobante, Factura o Recibo de la Compra",
        'precio_total.required' => "Usted no ha hecho ninguna compra, ingrese al menos un producto",
        'provehedor_id.required' => "Seleccione al provehedor de los productos que ha comprado",
        'fecha.required' => "Ingrese la fecha cuando se compro el producto",
        'fecha.date' => 'La fecha proporcionada no es válida.',  
        'fecha.before_or_equal' => 'La fecha no puede ser posterior a hoy.',  
        ]);

    $compra = new Compra();
    $compra->comprobante = $request->comprobante;
    $compra->precio_total = $request->precio_total;
    $compra->provehedor_id = $request->id_prov;
    $compra->fecha = $request->fecha;
    $compra->empresa_id = Auth::user()->empresa_id;
    $compra->save();

    //REGISTRO EN ARQUEO DE CAJA
    $arqueo_id = Arqueo::whereNull('fecha_cierre')->first();
    $mov = new MCaja();
    $mov->tipo = "EGRESO";
    $mov->monto = $request->precio_total;
    $mov->desc = "COMPRA DE PRODUCTOS";
    $mov->arqueo_id = $arqueo_id->id;
    $mov->save();

    $session_id = session()->getId();
    $tmp_compras = TmpCompra::where('session_id',$session_id)->get();
    foreach ($tmp_compras as $tmp_compra){

        $producto = Producto::where('id',$tmp_compra->producto_id)->first();
        $detalle_compra = new DetalleCompra();
        $detalle_compra->cantidad = $tmp_compra->cantidad;
        $detalle_compra->compra_id = $compra->id;
        $detalle_compra->producto_id = $tmp_compra->producto_id;
        $detalle_compra->save();

        $producto->stock += $tmp_compra->cantidad;
        $producto->save();
    }
    TmpCompra::where('session_id',$session_id)->delete();

    return to_route('compras.index')->with('success', 'Compra captada exitosamente.');
}

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $compra = Compra::with('detalles','provehedor')->findOrFail($id);
        return view('modulos.compras.show', compact('compra'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $compra = Compra::with('detalles','provehedor')->findOrFail($id);
        $provs = Provehedor::all();
        $productos = Producto::all();
        $total_cantidad = 0;
        $total_compra = 0;

        return view('modulos.compras.edit', compact('compra','provs','productos','total_cantidad','total_compra'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    //   $datos = request()->all();
    //   return response()->json($datos);

    $request->validate([
        'fecha' => 'required|date|before_or_equal:' . Carbon::today()->toDateString(),
        'comprobante' => 'required',
        'precio_total' => 'required',
    ],[
        'comprobante.required' => "Ingrese el Comprobante, Factura o Recibo de la Compra",
        'precio_total.required' => "Usted no ha hecho ninguna compra, ingrese al menos un producto",
        'fecha.required' => "Ingrese la fecha cuando se compro el producto",
        'fecha.date' => 'La fecha proporcionada no es válida.',  
        'fecha.before_or_equal' => 'La fecha no puede ser posterior a hoy.',  
        ]);

    $compra = Compra::find($id);
    $compra->comprobante = $request->comprobante;
    $compra->precio_total = $request->precio_total;
    $compra->provehedor_id = $request->id_prov;
    $compra->fecha = $request->fecha;
    $compra->empresa_id = Auth::user()->empresa_id;
    $compra->save();

        return to_route('compras.index')->with('success', 'Compra modificada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $compra = Compra::find($id);

        foreach ($compra->detalles as $detalle){
            $producto = Producto::find($detalle->producto_id);
            $producto->stock -= $detalle->cantidad;
            $producto->save();
        }

        $compra->detalles()->delete();
        Compra::destroy($id);
        return to_route('compras.index')->with('success', 'Compra eliminada exitosamente.');


    }
}
