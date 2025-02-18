<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignupRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Session;

class AuthController extends Controller
{
    public function showRegister(){
        return view("auth.registerShow");
    }
    
    public function submitRegister(UserRequest $request){
        $user = new User;
        $user->name = $request->input('Nombre');
        $user->username = $request->input('NombreDeUsuario');
        $user->email = $request->input('Email');
        $user->password = $request->input('Contraseña');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();
        Auth::login($user);
        
        return redirect()->route('home');
    }
    
    public function showLogin(){
        return view("auth.loginShow");
    }

    public function submitLogin(SignupRequest $request){
        $user = User::where("username", $request->input("UserOrEmail"))->first();
        
        if(!$user){
            $user = User::where("email", $request->input("UserOrEmail"))->first();
        }
        
        if(!$user){
            throw ValidationException::withMessages([
                "UserOrEmail" => "No existe el usuario o email ".$request->input("UserOrEmail")."."
            ]);
        }else{

            if(!Hash::check($request->input("Contraseña"), $user->password)){
                throw ValidationException::withMessages([
                    "Contraseña" => "Contraseña incorrecta."
                ]);
            }

            Auth::login($user);
        
            return redirect()->route('home');
        }
    }

    public function submitSignout(){
        Session::flush();
        Auth::logout();

        return redirect()->route("home");
    }
}
