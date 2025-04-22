<?php

namespace App\Http\Controllers;

use App\Models\Operacion;
use App\Models\Arqueo;
use App\Models\MCaja;
use App\Models\Local;
use App\Models\Tarifa;
use App\Models\User;
use App\Models\Inventario;
use App\Models\Cliente;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; 


class OperacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $openArq = Arqueo::whereNull('fecha_cierre')->first();

        $opers = Operacion::with('tarifa','cliente')
                        ->where('local_id',Auth::user()->local_id)
                        ->get();

        $localId = Auth::user()->local_id;  
        $centro = Local::find($localId);  

        return view('modulos.operaciones.index', compact('opers','centro','openArq'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $oper = new Operacion();
        $localId = Auth::user()->local_id;  
        $categoriaMercancias = Categoria::where('nombre', 'Material para Impresión')->first();  

        $inventarios = Inventario::where('local_id', $localId)  
            ->where('categoria_id', $categoriaMercancias->id)  
            ->get();  

        $tarifas = Tarifa::all();
        $clientes = Cliente::all();
        $totalInicial = 0;
        
        return view('modulos.operaciones.create', compact('oper','inventarios','tarifas','totalInicial','clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)  
    {  
        //$datos = request()->all();  
        //return response()->json($datos);  

        // Obtener la tarifa seleccionada  
        $tarifaId = $request->tarifa_id;  
        $tarifa = Tarifa::find($tarifaId);  

        // Validación de los campos  
        $rules = [  
            'fecha' => 'required|date|before_or_equal:' . Carbon::today()->toDateString(),  
            'precio' => 'required',  
            'cliente_id' => 'required',  
        ];  

        // Si la tarifa es del tipo que requiere cantidad e inventario_id, se añaden a las reglas  
        if ($tarifa && (  
            strpos($tarifa->nombre, 'Servicio de Timbrado de Hojas') !== false ||  
            strpos($tarifa->nombre, 'Impresión a Laser') !== false ||  
            strpos($tarifa->nombre, 'Escaneo de Documentos') !== false  
        )) {  
            $rules['cantidad'] = 'required|integer|min:1'; // Asegurar que cantidad sea requerida y mayor que 0  
            $rules['inventario_id'] = 'nullable|exists:inventarios,id'; // Asegurar que inventario_id sea requerido  
        }  

        // Mensajes de error personalizados  
        $messages = [  
            'precio.required' => "Usted no ha seleccionado ningún servicio",  
            'cliente_id.required' => "Seleccione al cliente por favor",  
            'fecha.required' => "Ingrese la fecha por favor",  
            'fecha.date' => 'La fecha proporcionada no es válida.',  
            'fecha.before_or_equal' => 'La fecha no ha llegado aún.',  
            'cantidad.required' => "La cantidad es obligatoria para este servicio.",  
            'cantidad.integer' => "La cantidad debe ser un número entero.",  
            'cantidad.min' => "La cantidad debe ser al menos 1.",  
            'inventario_id.required' => "Seleccione un producto de inventario.",  
        ];  

        // Validar los datos del request  
        $request->validate($rules, $messages);  

        // Creamos la instancia de Operacion  
        $operacion = new Operacion();  
        $operacion->nombre = $tarifa->nombre;  
        $operacion->operacion = $tarifa->operacion;  
        $operacion->importe = $request->precio;  
        $operacion->cantidad = $request->cantidad;  
        $operacion->tiempo = $request->tiempo;  
        $operacion->total = $request->total;  
        $operacion->cliente_id = $request->cliente_id;  
        $operacion->fecha = $request->fecha;  
        $operacion->tarifa_id = $tarifaId;  
        $operacion->local_id = Auth::user()->local_id;  
        $operacion->user_id = Auth::user()->id;  
        $operacion->save();  

                //REGISTRO EN ARQUEO DE CAJA
        $arqueo_id = Arqueo::whereNull('fecha_cierre')->first();
        $mov = new MCaja();
        $mov->tipo = "INGRESO";
        $mov->monto = $request->total;
        $mov->desc = "PRESTACIÓN DE SERVICIOS";
        $mov->arqueo_id = $arqueo_id->id;
        $mov->save();

        // Verificar si el inventario_id está habilitado (no null y existe en la base de datos)  
        if ($request->has('inventario_id') && $request->inventario_id) {  
            $inventario = Inventario::where('id', $request->inventario_id)->first();  
            
            // Actualizar el inventario solo si existe  
            if ($inventario) {  
                $inventario->stock -= $operacion->cantidad;  
                $inventario->save();  
            }  
        }  

        // Redirigir con mensaje de éxito  
        return to_route('operaciones.index')->with('success', 'Servicio captado exitosamente.');  
    }     

    /**
     * Display the specified resource.
     */
    public function show(Operacion $operacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $oper = Operacion::with('tarifa','cliente')->findOrFail($id);
        $localId = Auth::user()->local_id;  
        $categoriaMercancias = Categoria::where('nombre', 'Material para Impresión')->first();  

        $inventarios = Inventario::where('local_id', $localId)  
            ->where('categoria_id', $categoriaMercancias->id)  
            ->get();  

        $tarifas = Tarifa::all();
        $clientes = Cliente::all();
        $totalInicial = 0;
        
        return view('modulos.operaciones.edit', compact('oper','inventarios','tarifas','totalInicial','clientes'));
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, $id)  
{  
    // Obtener la operación existente  
    $operacion = Operacion::findOrFail($id);  
    $tarifaId = $operacion->tarifa_id;  
    $tarifa = Tarifa::find($tarifaId);  

    // Validación de los campos  
    $rules = [  
        'fecha' => 'required|date|before_or_equal:' . Carbon::today()->toDateString(),  
        'precio' => 'required',  
        'cliente_id' => 'required',  
    ];  

    // Si la tarifa requiere cantidad e inventario_id, se añaden a las reglas  
    if ($tarifa && (  
        strpos($tarifa->nombre, 'Servicio de Timbrado de Hojas') !== false ||  
        strpos($tarifa->nombre, 'Impresión a Laser') !== false ||  
        strpos($tarifa->nombre, 'Escaneo de Documentos') !== false  
    )) {  
        $rules['cantidad'] = 'required|integer|min:1'; // Asegurar que cantidad sea requerida y mayor que 0  
        $rules['inventario_id'] = 'nullable|exists:inventarios,id'; // Asegurar que inventario_id sea requerido  
    }  

    // Mensajes de error personalizados  
    $messages = [  
        'precio.required' => "Usted no ha seleccionado ningún servicio",  
        'cliente_id.required' => "Seleccione al cliente por favor",  
        'fecha.required' => "Ingrese la fecha por favor",  
        'fecha.date' => 'La fecha proporcionada no es válida.',  
        'fecha.before_or_equal' => 'La fecha no ha llegado aún.',  
        'cantidad.required' => "La cantidad es obligatoria para este servicio.",  
        'cantidad.integer' => "La cantidad debe ser un número entero.",  
        'cantidad.min' => "La cantidad debe ser al menos 1.",  
        'inventario_id.required' => "Seleccione un producto de inventario.",  
    ];  

    // Validar los datos del request  
    $request->validate($rules, $messages);  

    // Actualizar la operación  
    $operacion->nombre = $tarifa->nombre;  
    $operacion->operacion = $tarifa->operacion;  
    $operacion->importe = $request->precio;  
    $operacion->cantidad = $request->cantidad; // Puede ser nulo si no se requiere  
    $operacion->tiempo = $request->tiempo;  
    $operacion->total = $request->total; // Asegúrate de que este campo se envíe en la solicitud  
    $operacion->cliente_id = $request->cliente_id;  
    $operacion->fecha = $request->fecha;  
    $operacion->local_id = Auth::user()->local_id; // Si se requiere esto en la actualización  
    $operacion->user_id = Auth::user()->id; // Si se requiere esto en la actualización  
    $operacion->save();  

    // Verificar si el inventario_id está habilitado (no null y existe en la base de datos)  
    if ($request->has('inventario_id') && $request->inventario_id) {  
        $inventario = Inventario::where('id', $request->inventario_id)->first();  

        // Actualizar el inventario solo si existe  
        if ($inventario) {  
            // Ajustar la cantidad de stock dependiendo de si se cambió la cantidad  
            $diferenciaCantidad = $operacion->cantidad - $request->cantidad;  
            $inventario->stock -= $diferenciaCantidad;  
            $inventario->save();  
        }  
    }  

    // Redirigir con mensaje de éxito  
    return to_route('operaciones.index')->with('success', 'Servicio actualizado exitosamente.');  
}  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Operacion $operacion)
    {
        //
    }
}
