<?php

namespace App\Http\Controllers;

use App\Models\Arqueo;
use App\Models\MCaja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArqueoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $arqueos = Arqueo::all();
        
        return view('modulos.arqueos.index', compact('arqueos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $arqueo = new Arqueo();
        
        return view('modulos.arqueos.create', compact('arqueo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$datos = request()->all();  
        //return response()->json($datos); 
        
        $arqueo = new Arqueo();  
        $arqueo->fecha_apertura = $request->fecha_apertura;  
        $arqueo->monto_inicial = $request->monto_inicial; 
        $arqueo->desc = $request->desc;  
        $arqueo->local_id = Auth::user()->local_id;  
        $arqueo->user_id = Auth::user()->id;  

        $arqueo->save(); 
        
        return to_route('arqueos.index')->with('success', 'Caja abierta exitosamente.');  
    }

    /**
     * Display the specified resource.
     */
    public function show(Arqueo $arqueo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Arqueo $arqueo)
    {
        //
    }

    public function fluctuacion($id)
    {
        $arqueo = Arqueo::findOrFail($id);  
        return view('modulos.arqueos.fluctuacion', compact('arqueo'));
    }

    public function store_fluctuacion(Request $request)
    {
       //$datos = request()->all();
       //return response()->json($datos);

       $mov = new MCaja();
       $mov->tipo = $request->tipo;
       $mov->monto = $request->monto;
       $mov->desc = $request->desc;
       $mov->arqueo_id = $request->id;
       $mov->save();

       return to_route('arqueos.index')->with('success', 'Movimiento regístrado exitosamente.');  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $arqueo = Arqueo::findOrFail($id);  
        $arqueo->fecha_apertura = $request->fecha_apertura;  
        $arqueo->monto_inicial = $request->monto_inicial; 
        $arqueo->desc = $request->desc;  
        $arqueo->local_id = Auth::user()->local_id;  
        $arqueo->user_id = Auth::user()->id;  

        $arqueo->save(); 
        
        return to_route('arqueos.index')->with('success', 'Arqueo modificado exitosamente.');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Arqueo $arqueo)
    {
        //
    }
}
