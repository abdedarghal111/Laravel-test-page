<?php

namespace App\Http\Controllers;

use App\Http\Requests\CortosRequest;
use App\Models\Cortos;
use App\Models\Directores;
use App\Models\User;

class CortosController extends Controller
{
    public static $name = "cortos";

    public function action()
    {
        $objectsNumber = Cortos::get()->count();
        return view("cortos.action", compact("objectsNumber"));
    }

    public function index()
    {
        $cortos = Cortos::get();
        return view("cortos.index", compact('cortos'));
    }

    public function create()
    {
        return view("cortos.create");
    }

    public function store(CortosRequest $request)
    {
        $corto = new Cortos;
        $corto->titulo = $request->input('Título');
        $corto->sinopsis = $request->input('Sinopsis');
        $corto->director_id = $request->input('directorid');
        $corto->user_id = $request->input('userid');
        $corto->created_at = now();
        $corto->updated_at = now();
        $corto->save();
        return redirect()->route('cortos.index')->with('status','Corto añadido correctamente');
    }

    public function show(string $id)
    {
        $corto = Cortos::findOrFail($id);
        return view("cortos.show", compact('corto'));
    }

    public function edit(string $id)
    {
        $corto = Cortos::findOrFail($id);
        $usuarios = User::select("id", "name")->orderBy("id")->get();
        $directores = Directores::select("id", "nombre", "apellidos")->orderBy("id")->get();
        return view("cortos.edit", [
            "corto" => $corto,
            "usuarios" => $usuarios,
            "directores" => $directores
        ]);
    }

    public function update(CortosRequest $request, string $id)
    {
        $corto = Cortos::findOrFail($id);
        $corto->titulo = $request->input('Título');
        $corto->sinopsis = $request->input('Sinopsis');
        $corto->director_id = $request->input('directorid');
        $corto->user_id = $request->input('userid');
        $corto->updated_at = now();
        $corto->save();
        return redirect()->route('cortos.index')->with('status','Corto editado correctamente');
    }

    public function destroy(string $id)
    {
        $corto = Cortos::findOrFail($id);
        $corto->deleteOrFail();
        return redirect()->route('cortos.index')->with('status','Corto eliminado correctamente');
    }
}
