<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CortosController;
use App\Http\Controllers\DirectoresController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name("home");

//rutas de las clases base
foreach ([UserController::class, CortosController::class, DirectoresController::class] as $class) {
    $name = $class::$name;
    if($name === "cortos"){
        Route::get("$name/action", "$class@action")->name("$name.action"); //todos

        Route::resource($name, $class)->parameter($name, $name)// editar
            ->except(["index","show"])->middleware(["auth", "rol:editor,admin"]);

        Route::resource($name, $class)->parameter($name, $name)// ver
            ->only(["index","show"]); //todos

    }else if($name === "directores"){

        Route::get("$name/action", "$class@action")->name("$name.action")
            ->middleware(["auth"]);

        Route::resource($name, $class)->parameter($name, $name)// editar
            ->except(["index","show"])->middleware(["auth", "rol:editor,admin"]);

        Route::resource($name, $class)->parameter($name, $name)// ver
            ->only(["index","show"])->middleware(["auth"]);

    }else {//users
        
        Route::get("$name/action", "$class@action")->name("$name.action")
            ->middleware(["auth", "rol:editor,admin"]);

        Route::resource($name, $class)->parameter($name, $name)// editar
            ->except(["index","show"])->middleware(["auth", "rol:admin"]);

        Route::resource($name, $class)->parameter($name, $name)// ver
            ->only(["index","show"])->middleware(["auth", "rol:editor,admin"]);
    }
}

//ruta del auth para login y register
$auth = AuthController::class;
Route::middleware(["guest"])->group(function() use ($auth){
    Route::get('signup/show', "$auth@showLogin")->name('login.show');
    Route::get('login/show', "$auth@showRegister")->name('signup.show');
    Route::post('signup/submit', "$auth@submitLogin")->name('login.submit');
    Route::post('login/submit', "$auth@submitRegister")->name('signup.submit');
});

Route::get('signout/submit', "$auth@submitSignout")->name('signout.submit')
    ->middleware(["auth"]);