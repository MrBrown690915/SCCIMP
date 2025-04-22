<?php

namespace App\Http\Controllers;

use App\Models\TmpVenta;
use App\Models\Inventario;
use Illuminate\Http\Request;

class TmpVentaController extends Controller
{
    
    public function tmp_ventas(Request $request)
    {
        $inventario = Inventario::where('codigo',$request->codigo)->first();
        $session_id = session()->getId();

        if($inventario) {

            $tmp_venta_exist = TmpVenta::where('inventario_id',$inventario->id)
                                        ->where('session_id',$session_id)
                                        ->first();

            if($tmp_venta_exist) {
                $tmp_venta_exist->cantidad += $request->cantidad;
                $tmp_venta_exist->save();
                return response()->json(['success'=>true, 'message'=>'inventario encontrado']);  
            }else{
                $tmp_venta = new TmpVenta();
                $tmp_venta->cantidad = $request->cantidad;
                $tmp_venta->inventario_id = $inventario->id;
                $tmp_venta->session_id = session()->getId();
                $tmp_venta->save();
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
    public function show(TmpVenta $tmpVenta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TmpVenta $tmpVenta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TmpVenta $tmpVenta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        TmpVenta::destroy($id);
        return response()->json(['success'=>true]);  
    }
}
