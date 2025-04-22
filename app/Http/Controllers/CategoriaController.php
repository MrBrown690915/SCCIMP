<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    
        public function index()
    {
        $categorias = Categoria::orderBy('nombre', 'asc')->get();
        return view('modulos.categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('modulos.categorias.index', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categoria = new Categoria();
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->save();
        return to_route('categorias.index')->with('success', 'Categoria creada exitosamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('modulos.categorias.index', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */ 
    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);

        if ($categoria->es_sistema) {  
            // Opción 1: Devolver un error y redirigir  
            return back()->with('error', 'No se puede editar una categoría del sistema.');  
        
        }else{
            $categoria->nombre = $request->nombre;
            $categoria->descripcion = $request->descripcion;
            $categoria->save();
        } 
        
        return to_route('categorias.index')->with('success', 'Categoría actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);

        if ($categoria->es_sistema) {  
            return back()->with('error', 'No se puede eliminar una categoría del sistema.');  
        } 

        $categoria->delete();

        return redirect()->back()->with('success', 'Categoría eliminada exitosamente.');
    }

}
