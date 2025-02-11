<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Hash;

class UserController extends Controller
{
    public static $name = "user";

    public function action()
    {
        $objectsNumber = User::get()->count();
        return view("user.action", compact("objectsNumber"));
    }

    public function index()
    {
        $users = User::get();
        return view("user.index", compact('users'));
    }

    public function create()
    {
        return view("user.create");
    }

    public function store(UserRequest $request)
    {
        $user = new User;
        $user->name = $request->input('Nombre');
        $user->email = $request->input('Email');
        $user->password = Hash::make($request->input('Contraseña'));
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();
        return redirect()->route('user.index')->with('status','Usuario añadido correctamente');
    }

    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view("user.show", compact('user'));
    }

    public function edit(User $user)
    {
        return view("user.edit", compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        $user->name = $request->input('Nombre');
        $user->email = $request->input('Email');
        $user->password = Hash::make($request->input('Contraseña'));
        $user->updated_at = now();
        $user->save();
        return redirect()->route('user.index')->with('status','Usuario editado correctamente');
    }

    public function destroy(User $User)
    {
        $User->deleteOrFail();
        return redirect()->route('user.index')->with('status','Usuario eliminado correctamente');
    }
}
