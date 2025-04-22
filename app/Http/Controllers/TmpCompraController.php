<?php

namespace App\Http\Controllers;

use App\Models\tmpCompra;
use App\Models\Producto;
use Illuminate\Http\Request;

class TmpCompraController extends Controller
{

    public function tmp_compras(Request $request)
    {
        $producto = Producto::where('codigo',$request->codigo)->first();
        $session_id = session()->getId();

        if($producto) {

            $tmp_compra_exist = TmpCompra::where('producto_id',$producto->id)
                                        ->where('session_id',$session_id)
                                        ->first();

            if($tmp_compra_exist) {
                $tmp_compra_exist->cantidad += $request->cantidad;
                $tmp_compra_exist->save();
                return response()->json(['success'=>true, 'message'=>'Producto encontrado']);  
            }else{
                $tmp_compra = new TmpCompra();
                $tmp_compra->cantidad = $request->cantidad;
                $tmp_compra->producto_id = $producto->id;
                $tmp_compra->session_id = session()->getId();
                $tmp_compra->save();
                return response()->json(['success'=>true, 'message'=>'Producto encontrado']);  
            }

        }else{
            return response()->json(['success'=>false, 'message'=>'Producto no encontrado']);  
        }
    }

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
    public function show(tmpCompra $tmpCompra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tmpCompra $tmpCompra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tmpCompra $tmpCompra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        TmpCompra::destroy($id);
        return response()->json(['success'=>true]);  
    }
}
