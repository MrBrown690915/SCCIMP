<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Arqueo;
use App\Models\MCaja;
use App\Models\Local;
use App\Models\Inventario;
use App\Models\Cliente;
use App\Models\Categoria;
use App\Models\TmpVenta;
use App\Models\DetalleVenta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon; 
use PDF;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $openArq = Arqueo::whereNull('fecha_cierre')->first();
        
        $ventas = Venta::with('detalleVenta','cliente')
                        ->where('local_id',Auth::user()->local_id)
                        ->get();

        $localId = Auth::user()->local_id;  
        $centro = Local::find($localId);  
                
        return view('modulos.ventas.index',compact('ventas','centro','openArq'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $venta = new Venta();  
        $localId = Auth::user()->local_id;  
    
        // Obtener el ID de la categoría "Mercancías para la Venta"  
        $categoriaMercancias = Categoria::where('nombre', 'Mercancías para la Venta')->first();  
    
        // Verificar si se encontró la categoría  
        if (!$categoriaMercancias) {  
            // Manejar el caso en que no se encuentra la categoría  
            // Esto podría ser lanzar una excepción, mostrar un error al usuario, etc.  
            // Por ejemplo:  
            return back()->with('error', 'No se encontró la categoría "Mercancías para la Venta".');  
        }  
    
        // Filtrar los inventarios por local_id y categoria_id  
        $inventarios = Inventario::where('local_id', $localId)  
            ->where('categoria_id', $categoriaMercancias->id)  
            ->get();  
    
        $clientes = Cliente::all();  
        $total_cantidad = 0;  
        $total_venta = 0;  
    
        $session_id = session()->getId();  
        $tmp_ventas = TmpVenta::where('session_id', $session_id)->get();  
    
        return view('modulos.ventas.create', compact('inventarios', 'clientes',  
            'tmp_ventas', 'total_cantidad', 'total_venta'));     }

    public function cliente_store(Request $request)
    {
        $validate = $request->validate([
            'ci' => 'required|unique:clientes,ci|max:11|min:11',
            'nombre' => 'required',
            'email' => 'required|unique:clientes',
        ]);

        $cliente = new Cliente();
        $cliente->ci = $request->ci;
        $cliente->nombre = $request->nombre;
        $cliente->email = $request->email;
        $cliente->direc = $request->direc;
        $cliente->telef = $request->telef;
        $cliente->empresa_id = Auth::user()->empresa_id;
        $cliente->save();

        return response()->json(['success'=>'Cliente creado exitosamente.']);

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
        'precio_total' => 'required',
        'cliente_id' => 'required',
    ],[
        'precio_total.required' => "Usted no ha hecho ninguna venta, ingrese al menos un producto",
        'cliente_id.required' => "Seleccione al cliente de los productos que ha vendido",
        'fecha.required' => "Ingrese la fecha cuando se vendió el producto",
        'fecha.date' => 'La fecha proporcionada no es válida.',  
        'fecha.before_or_equal' => 'La fecha no ha llegado aún.',  
    ]);

    $venta = new Venta();
    $venta->precio_total = $request->precio_total;
    $venta->cliente_id = $request->cliente_id;
    $venta->fecha = $request->fecha;
    $venta->local_id = Auth::user()->local_id;
    $venta->empresa_id = Auth::user()->empresa_id;
    $venta->save();

        //REGISTRO EN ARQUEO DE CAJA
    $arqueo_id = Arqueo::whereNull('fecha_cierre')->first();
    $mov = new MCaja();
    $mov->tipo = "INGRESO";
    $mov->monto = $request->precio_total;
    $mov->desc = "VENTA DE MERCANCÍAS";
    $mov->arqueo_id = $arqueo_id->id;
    $mov->save();

    $session_id = session()->getId();
    $tmp_ventas = TmpVenta::where('session_id',$session_id)->get();
    foreach ($tmp_ventas as $tmp_venta){

        $inventario = Inventario::where('id',$tmp_venta->inventario_id)->first();
        $detalle_venta = new DetalleVenta();
        $detalle_venta->cantidad = $tmp_venta->cantidad;
        $detalle_venta->venta_id = $venta->id;
        $detalle_venta->inventario_id = $tmp_venta->inventario_id;
        $detalle_venta->save();

        $inventario->stock -= $tmp_venta->cantidad;
        $inventario->save();
    }
    TmpVenta::where('session_id',$session_id)->delete();

    return to_route('ventas.index')->with('success', 'Venta captada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $venta = Venta::with('detalleVenta','cliente')->findOrFail($id);
        return view('modulos.ventas.show', compact('venta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $venta = Venta::with('detalleVenta','cliente')->findOrFail($id);
        $clientes = Cliente::all();
        $inventarios = Inventario::all();
        $total_cantidad = 0;
        $total_venta = 0;

        return view('modulos.ventas.edit', compact('venta','clientes','inventarios','total_cantidad','total_venta'));
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
        'cliente_id' => 'required',
    ],[
        'cliente_id.required' => "Seleccione al cliente de los productos que ha vendido",
        'fecha.required' => "Ingrese la fecha cuando se vendió el producto",
        'fecha.date' => 'La fecha proporcionada no es válida.',  
        'fecha.before_or_equal' => 'La fecha no ha llegado aún.',  
    ]);

    $venta = Venta::find($id);
    $venta->precio_total = $request->precio_total;
    $venta->cliente_id = $request->cliente_id;
    $venta->fecha = $request->fecha;
    $venta->local_id = Auth::user()->local_id;
    $venta->empresa_id = Auth::user()->empresa_id;
    $venta->save();

    return to_route('ventas.index')->with('success', 'Venta actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $venta = Venta::find($id);

        foreach ($venta->detalleVenta as $detalle){
            $inventario = Inventario::find($detalle->inventario_id);
            $inventario->stock += $detalle->cantidad;
            $inventario->save();
        }

        $venta->detalleVenta()->delete();
        Venta::destroy($id);
        return to_route('ventas.index')->with('success', 'Venta eliminada exitosamente.');
    }

    public function pdf($id)
    {
    
    // mostrar la vista de reporte antes de descargarla
    //    $pdf = PDF::loadView('modulos.ventas.pdf');
    //    return $pdf->stream('test.pdf');
        return view('modulos.ventas.pdf');

    }
}
