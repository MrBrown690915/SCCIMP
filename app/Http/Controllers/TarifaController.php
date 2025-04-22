<?php

namespace App\Http\Controllers;

use App\Models\Tarifa;
use Illuminate\Http\Request;

class TarifaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tarifas = Tarifa::all();
        return view('modulos.tarifas.index', compact('tarifas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tarifas = Tarifa::all();
        return view('modulos.tarifas.index', compact('tarifas'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tarifa = new Tarifa();
        $tarifa->nombre = $request->nombre;
        $tarifa->operacion = $request->operacion;
        $tarifa->precio = $request->precio;
        $tarifa->save();
        return to_route('tarifas.index')->with('success', 'Tarifa creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarifa $tarifa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tarifa = Tarifa::findOrFail($id);
        return view('modulos.tarifas.index', compact('tarifa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tarifa->nombre = $request->nombre;
        $tarifa->operacion = $request->operacion;
        $tarifa->precio = $request->precio;
        $tarifa->save();
        return to_route('tarifas.index')->with('success', 'Tarifa actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tarifa = Tarifa::findOrFail($id);
        $tarifa->delete();

        return redirect()->back()->with('success', 'Tarifa eliminada exitosamente.');
    }
}
