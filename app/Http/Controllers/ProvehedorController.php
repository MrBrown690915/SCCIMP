<?php

namespace App\Http\Controllers;

use App\Models\Provehedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Exception;

class ProvehedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $provs = Provehedor::all();
        return view('modulos.provehedores.index', compact('provs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modulos.provehedores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
                'empresa' => 'required',
                'direccion' => 'required',
                'telefono' => 'required',
                'email' => 'required|unique:users',
                'nombre' => 'required',
                'movil' => 'required',
        ],[
                'empresa.required' => "Ingrese el Nombre de la Empresa, MPYME o TCP",
                'direccion.required' => "Ingrese la Dirección Postal de la Empresa, MPYME o TCP",
                'telefono.required' => "Ingrese el Teléfono de la Empresa, MPYME o TCP",
                'nombre.required' => "Ingrese el Nombre del Provehedor",
                'movil.required' => "Ingrese el movil del Provehedor",
                'email.required' => "Ingrese un correo electrónico de la Empresa, MYPIME o TCP",
                'email.unique' => "Ya este Correo está regístrado !!!",
        ]);
    
            Provehedor::create([
                'empresa' => $request->empresa,
                'direccion' => $request->direccion,
                'telefono' => $request->telefono,
                'email' => $request->email,
                'nombre' => $request->nombre,
                'movil' => $request->movil,
                'empresa_id' => Auth::user()->empresa_id,
        ]);
    
        return to_route('provehedores.index')->with('success', 'Provehedor creado exitosamente.');

}

    /**
     * Display the specified resource.
     */
    public function show(Provehedor $provehedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Provehedor $provehedor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $prov = Provehedor::findOrFail($id);
        $prov->empresa = $request->empresa;
        $prov->direccion = $request->direccion;
        $prov->telefono = $request->telefono;
        $prov->email = $request->email;
        $prov->nombre = $request->nombre;
        $prov->movil = $request->movil;
        $prov->empresa_id = Auth::user()->empresa_id;
        $prov->save();

        //$user->update($request->all());
        return Redirect::route('provehedores.index')->with('success', 'Provehedor actualizado exitosamente.');

    }

    public function destroy(string $id)
    {
        $prov = Provehedor::findOrFail($id);
        $prov->delete();
        return redirect()->back()->with('success', 'Provehedor eliminado exitosamente.');
        
    }
}
