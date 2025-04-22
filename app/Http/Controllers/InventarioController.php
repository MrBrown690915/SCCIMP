<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Producto;
use App\Models\Local;
use App\Models\Categoria;
use App\Models\User;
use App\Models\TmpInventario;
use App\Models\DetalleInventario;
use App\Models\Provehedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; 

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invs = Inventario::all();
        $locals = Local::where('nombre', 'LIKE', '%Centro%')->get();  
        $categorias = Categoria::all();
        $users = User::all();

        return view('modulos.inventarios.index', compact('invs','locals','categorias','users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $inventario = new Inventario();
        $productos = Producto::where('empresa_id',Auth::user()->empresa_id)
                            ->where('activo',1)->get();
        $locals = Local::where('empresa_id',Auth::user()->empresa_id)
                        ->where('nombre', 'LIKE', '%Centro%')
                        ->orderBy('nombre', 'asc')->get();

        $session_id = session()->getId();
        $tmp_inventarios = TmpInventario::where('session_id',$session_id)->get();

        $total_cantidad = 0;
        
        return view('modulos.inventarios.create', compact('productos','locals',
                    'tmp_inventarios', 'total_cantidad'));
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
        'local_id' => 'required',
    ],[
        'local_id.required' => "Seleccione al Centro de Impresión que desea asignar los productos.",
        'fecha.required' => "Ingrese la fecha por favor",
        'fecha.date' => 'La fecha proporcionada no es válida.',  
        'fecha.before_or_equal' => 'La fecha no puede ser posterior a hoy.',  
        ]);

        $session_id = session()->getId();  
        $tmp_inventarios = Tmpinventario::where('session_id', $session_id)->get();  

        $catId = 1;
    
        foreach ($tmp_inventarios as $tmp_inventario) {  
            $producto = Producto::where('id', $tmp_inventario->producto_id)->first();  

            // Calcula los valores que vamos a almacenar  
        if ($producto->medida === 'Paquete' && $producto->categoria_id === $catId) {  
            $nuevo_stock = $producto->stock_paq * $tmp_inventario->cantidad; // Copiar stock_paq  
            $stock_min = $producto->stock_paq * 0.20; // Calcular el 20% para stock_min  
        } else {  
            $nuevo_stock = $tmp_inventario->cantidad; // Usar la cantidad del tmp_inventario  
            $stock_min = 10; // o algún valor por defecto que desees  
        }  

        // Crear o actualizar el inventario, sumando al stock existente si ya existe  
        $inventario = Inventario::where('codigo', $producto->codigo)  
            ->where('local_id', $request->local_id)  
            ->first();  

        if ($inventario) {  
            // Si el inventario ya existe, se incrementa el stock  
            $inventario->stock += $nuevo_stock; // Sumar al stock existente  
            $inventario->stock_min = $stock_min; // Actualizar el stock mínimo si es necesario  
            $inventario->save(); // Guardar cambios  
        } else {  
            // Si no existe, crear un nuevo registro  
            Inventario::create([  
                'codigo' => $producto->codigo,  
                'local_id' => $request->local_id,  
                'fecha' => $request->fecha,  
                'user_id' => Auth::user()->id,  
                'stock' => $nuevo_stock,  
                'stock_min' => $stock_min,  
                'nombre' => $producto->nombre,  
                'medida' => $producto->medida, 
                'precio_venta' =>$producto->precio_venta, 
                'categoria_id' => $producto->categoria_id,  
            ]);  
        }  

        // Actualizar stock del producto  
        $producto->stock -= $tmp_inventario->cantidad; // Resta el stock usado en el inventario  
        $producto->save();  
    }  

    // Eliminar los inventarios temporales  
    Tmpinventario::where('session_id', $session_id)->delete();  

    return to_route('inventarios.index')->with('success', 'Operación realizada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventario $inventario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $inventario = Inventario::with('local')->findOrFail($id);
        $categorias = Categoria::all();

        return view('modulos.inventarios.edit', compact('inventario','categorias'));

    }

    /**
     * Update the specified resource in storage.
     */
   
     public function update(Request $request, $id)
    {
       //$datos = request()->all();
       //return response()->json($datos);

       $inventario = Inventario::find($id);
       $inventario->stock_min = $request->stock_min;
       $inventario->categoria_id = $request->categoria_id;
       $inventario->fecha = $request->fecha;
       $inventario->save();
        
        return to_route('inventarios.index')->with('success', 'inventario Modificado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Buscar el producto por su ID  
        $inventario = Inventario::find($id);  

        // Verificar si el nombre contiene "paquete de hojas" (insensible a mayúsculas)  
        if ($inventario && stripos($inventario->nombre, 'paquete de hojas') === false) { 
             // Buscar el producto correspondiente en la tabla productos por su código  
            $producto = Producto::where('codigo', $inventario->codigo)->first();  

            // Verificar si se encontró el producto  
            if ($producto) {  
                // Incrementar el stock del producto con el valor que tenía el stock en inventarios  
                $producto->stock += $inventario->stock;  // Ajusta si es necesario  
                $producto->save(); // Guardar los cambios en la base de datos  
            }   
            $inventario->delete(); // Elimina el producto  

            return to_route('inventarios.index')->with('success', 'Producto eliminado exitosamente.');
        } else {  
            return to_route('inventarios.index')->with('error', 'Los Paquetes de Hojas no se pueden eliminar');
        }  
    }
}
