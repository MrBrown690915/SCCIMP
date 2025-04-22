<?php

namespace App\Http\Controllers;

use App\Models\TmpInventario;
use App\Models\Producto;
use Illuminate\Http\Request;

class TmpInventarioController extends Controller
{
    
    public function tmp_inventarios(Request $request)
    {
        $producto = Producto::where('codigo',$request->codigo)->first();
        $session_id = session()->getId();

        if($producto) {

            $tmp_inventario_exist = TmpInventario::where('producto_id',$producto->id)
                                        ->where('session_id',$session_id)
                                        ->first();

            if($tmp_inventario_exist) {
                $tmp_inventario_exist->cantidad += $request->cantidad;
                $tmp_inventario_exist->save();
                return response()->json(['success'=>true, 'message'=>'Producto encontrado']);  
            }else{
                $tmp_inventario = new TmpInventario();
                $tmp_inventario->cantidad = $request->cantidad;
                $tmp_inventario->producto_id = $producto->id;
                $tmp_inventario->session_id = session()->getId();
                $tmp_inventario->save();
                return response()->json(['success'=>true, 'message'=>'Producto encontrado']);  
            }

        }else{
            return response()->json(['success'=>false, 'message'=>'Producto no encontrado']);  
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TmpInventario $tmpInventario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TmpInventario $tmpInventario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TmpInventario $tmpInventario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        TmpInventario::destroy($id);
        return response()->json(['success'=>true]);  
    }
}
