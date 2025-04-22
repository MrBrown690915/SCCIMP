<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Provehedor;
use App\Models\Empresa;
use App\Exports\ProductoExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon; 

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function estado($id, $estado){
        $producto = Producto::find($id);
        $producto->activo = $estado;
        return $producto->save();
    }

     public function index()
    {
        $empresa_id = Auth::user()->empresa_id;
        $empresas = Empresa::all();
        $categorias = Categoria::all();
        $actprods = Producto::where('empresa_id',$empresa_id)
                            ->where('activo', true)
                            ->orderBy('nombre', 'asc')->get();

        $inactprods = Producto::where('empresa_id',$empresa_id)
                            ->where('activo', false)
                            ->orderBy('nombre', 'asc')->get();

        
        return view('modulos.productos.index', compact('actprods','inactprods','empresas','categorias'));
    }

    public function reporte()
    {
        $empresa_id = Auth::user()->empresa_id;
        $empresas = Empresa::all();
        $categorias = Categoria::all()->orderBy('nombre', 'asc');
        $productos = Producto::where('empresa_id',$empresa_id)
                            ->orderBy('nombre', 'asc')->get();

        return view('modulos.reportes.productos', compact('productos','empresas','categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $producto = new Producto();
        $empresas = Empresa::all();
        $categorias = Categoria::all();
        return view('modulos.productos.create', compact('producto','empresas','categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$datos = request()->all();
        // return response()->json($datos);
        
        $request->validate([
            'codigo' => 'required|unique:productos,codigo',
            'nombre' => 'required',
            'medida' => 'required',
            'stock' => 'required',
            'stock_paq' => 'required_if:medida,Paquete',
            'stock_min' => 'required',
            'stock_max' => 'required',
            'precio_compra' => 'required',
            'precio_venta' => 'required',
            'fecha' => 'required|date|before_or_equal:' . Carbon::today()->toDateString(),
        ],[
            'codigo.required' => "Ingrese el Código del Producto",
            'codigo.unique' => "Ya ese Código está regístrado !!!",
            'nombre.required' => "Ingrese el Nombre del Producto",
            'medida.required' => "Ingrese la Unidad de Medida del Producto",
            'stock.required' => "Ingrese la cantidad del Producto existente en Almacén",
            'stock_paq.required_if' => "Ingrese la cantidad de Unidades que trae cada Paquete",
            'stock_min.required' => "Ingrese la cantidad mínima del Producto permitida en Almacén",
            'stock_max.required' => "Ingrese la cantidad máxima del Producto permitida en Almacén",
            'precio_compra.required' => "Ingrese el costo del producto",
            'precio_venta.required' => "Ingrese el precio en que se venderá el producto",
            'fecha.required' => "Ingrese la fecha cuando se compro el producto",
            'fecha.date' => 'La fecha proporcionada no es válida.',  
            'fecha.before_or_equal' => 'La fecha no puede ser posterior a hoy.', 
            ]);

        $producto = new Producto();
        $producto->codigo = $request->codigo;
        $producto->nombre = $request->nombre;
        $producto->stock = $request->stock;
        $producto->stock_paq = $request->stock_paq;
        $producto->stock_min = $request->stock_min;
        $producto->stock_max = $request->stock_max;
        $producto->precio_compra = $request->precio_compra;
        $producto->precio_venta = $request->precio_venta;
        $producto->fecha = $request->fecha;
        $producto->empresa_id = Auth::user()->empresa_id;
        $producto->user_id = Auth::user()->id;
        $producto->categoria_id = $request->categoria_id;
        $producto->medida = $request->medida;

        $producto->save();

        return to_route('productos.index')->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $prod = Producto::with(['categoria', 'empresa'])->findOrFail($id);
        return view('modulos.productos.index', compact('prod'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $producto = Producto::with(['categoria', 'empresa'])->findOrFail($id);
        $categorias = Categoria::all();

        return view('modulos.productos.edit', compact('producto','categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    //    $datos = request()->all();
    //    return response()->json($datos);
        
       $request->validate([
        'codigo' => 'required|unique:productos,codigo,'.$id,
        'nombre' => 'required',
        'stock' => 'required',
        'stock_paq' => 'nullable',
        'stock_min' => 'required',
        'stock_max' => 'required',
        'precio_compra' => 'required',
        'precio_venta' => 'required',
        'fecha' => 'required|date|before_or_equal:' . Carbon::today()->toDateString(),
    ],[
        'codigo.required' => "Ingrese el Código del Producto",
        'codigo.unique' => "Ya ese Código está regístrado !!!",
        'nombre.required' => "Ingrese el Nombre del Producto",
        'stock.required' => "Ingrese la cantidad del Producto existente en Almacén",
        'stock_min.required' => "Ingrese la cantidad mínima del Producto permitida en Almacén",
        'stock_max.required' => "Ingrese la cantidad máxima del Producto permitida en Almacén",
        'precio_compra.required' => "Ingrese el costo del producto",
        'fecha.required' => "Ingrese la fecha cuando se compro el producto",
        'fecha.date' => 'La fecha proporcionada no es válida.',  
        'fecha.before_or_equal' => 'La fecha proporcionada no es válida.',  
        ]);

    $producto = Producto::find($id);
    $producto->codigo = $request->codigo;
    $producto->nombre = $request->nombre;
    $producto->stock = $request->stock;
    $producto->stock_min = $request->stock_min;
    $producto->stock_max = $request->stock_max;
    $producto->precio_compra = $request->precio_compra;
    $producto->precio_venta = $request->precio_venta;
    $producto->fecha = $request->fecha;
    $producto->empresa_id = Auth::user()->empresa_id;
    $producto->user_id = Auth::user()->id;
    $producto->categoria_id = $request->categoria_id;
    $producto->medida = $request->medida;
    if ($request->input('medida') === 'Paquete') {  
        $producto->stock_paq = $request->input('stock_paq'); // Asigna el valor si la medida es 'Paquete'  
    } else {  
        $producto->stock_paq = null; // O puedes dejarlo como está si no quieres modificarlo  
    }  
    $producto->save();

    return to_route('productos.index')->with('success', 'Producto actualizado exitosamente.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
