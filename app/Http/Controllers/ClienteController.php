<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Empresa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresa_id = Auth::user()->empresa_id;
        $clientes = Cliente::where('empresa_id',$empresa_id)->orderBy('nombre', 'asc')->get();

        return view('modulos.clientes.index', compact('clientes'));
    }

    public function estado($id, $estado){
        $cliente = Cliente::find($id);
        $cliente->activo = $estado;
        return $cliente->save();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empresas = Empresa::all();
        $cliente = new Cliente();

        return view('modulos.clientes.create', compact('cliente'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        
        $request->validate([
            'ci' => 'required|unique:clientes,ci|max:11|min:11',
            'nombre' => 'required',
            'email' => 'required|unique:clientes',
        ],[
            'ci.required' => "Ingrese el Carnet de Identidad",
            'ci.unique' => "Ya ese Carnet de Identidad está regístrado !!!",
            'ci.min'=> "El Carnet de Identidad es de 11 dígitos, Revise",
            'ci.max'=> "El Carnet de Identidad excede los 11 dígitos",
            'name.required' => "Ingrese el Nombre del Cliente",
            'email.required' => "Ingrese un correo electrónico del Cliente",
            'email.unique' => "Ya este Correo está regístrado !!!",
        ]);

        $cliente = new Cliente();
        $cliente->ci = $request->ci;
        $cliente->nombre = $request->nombre;
        $cliente->email = $request->email;
        $cliente->direc = $request->direc;
        $cliente->telef = $request->telef;
        $cliente->empresa_id = Auth::user()->empresa_id;
        $cliente->save();

        return to_route('clientes.index')->with('success', 'Cliente creado exitosamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);
        $cliente->nombre = $request->nombre;
        $cliente->email = $request->email;
        $cliente->direc = $request->direc;
        $cliente->telef = $request->telef;
        $cliente->empresa_id = Auth::user()->empresa_id;
        $cliente->save();

        return Redirect::route('clientes.index')->with('success', 'Cliente actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);

        $cliente->delete();
        return redirect()->back()->with('success', 'Cliente eliminado exitosamente.');
    }
}
