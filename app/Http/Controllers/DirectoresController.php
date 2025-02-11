<?php

namespace App\Http\Controllers;

use App\Http\Requests\DirectoresRequest;
use App\Models\Directores;

class DirectoresController extends Controller
{
    public static $name = "directores";

    public function action()
    {
        $objectsNumber = Directores::get()->count();
        return view("directores.action", compact("objectsNumber"));
    }

    public function index()
    {
        $directores = Directores::get();
        return view("directores.index", compact('directores'));
    }

    public function create()
    {
        return view("directores.create");
    }

    public function store(DirectoresRequest $request)
    {
        $director = new Directores;
        $director->nombre = $request->input('Nombre');
        $director->apellidos = $request->input('Apellidos');
        $director->created_at = now();
        $director->updated_at = now();
        $director->save();
        return redirect()->route('directores.index')->with('status','Usuario añadido correctamente');
    }

    public function show(string $id)
    {
        $director = Directores::findOrFail($id);
        return view("directores.show", compact('director'));
    }

    public function edit(string $id)
    {
        $director = Directores::findOrFail($id);
        return view("directores.edit", compact('director'));
    }

    public function update(DirectoresRequest $request, string $id)
    {
        $director = Directores::findOrFail($id);
        $director->nombre = $request->input('Nombre');
        $director->apellidos = $request->input('Apellidos');
        $director->updated_at = now();
        $director->save();
        return redirect()->route('directores.index')->with('status','Director editado correctamente');
    }

    public function destroy(string $id)
    {
        $director = Directores::findOrFail($id);
        $director->deleteOrFail();
        return redirect()->route('directores.index')->with('status',var_dump($director).'Director eliminado correctamente');
    }
}
