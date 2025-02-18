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
        Route::resource($name, $class)->parameter($name, $name)->except(["index","show"])->middleware(["auth", "rol:director,admin"]);
        Route::resource($name, $class)->parameter($name, $name)->only(["index","show"]); //todos
    }else if($name === "directores"){
        Route::get("$name/action", "$class@action")->name("$name.action");
        Route::resource($name, $class)->parameter($name, $name)->except(["index","show"])->middleware(["auth", "rol:director,admin"]);
        Route::resource($name, $class)->parameter($name, $name)->only(["index","show"])->middleware(["auth"]);
    }else {//users
        Route::get("$name/action", "$class@action")->name("$name.action");
        Route::resource($name, $class)->parameter($name, $name)->except(["index","show"])->middleware(["auth"])->middleware(["auth", "rol:admin"]);
        Route::resource($name, $class)->parameter($name, $name)->only(["index","show"]);
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

Route::get('signout/submit', "$auth@submitSignout")->name('signout.submit')->middleware(["auth"]);

//test rutas
Route::get('rutas', function () {
    $routeCollection = Route::getRoutes();

    echo "<table style='width:100%'>";
    echo "<tr>";
    echo "<td width='10%'><h4>HTTP Method</h4></td>";
    echo "<td width='10%'><h4>Route</h4></td>";
    echo "<td width='10%'><h4>Name</h4></td>";
    echo "<td width='70%'><h4>Corresponding Action</h4></td>";
    echo "</tr>";
    foreach ($routeCollection as $value) {
        echo "<tr>";
        echo "<td>" . $value->methods()[0] . "</td>";
        echo "<td>" . $value->uri() . "</td>";
        echo "<td>" . $value->getName() . "</td>";
        echo "<td>" . $value->getActionName() . "</td>";
        echo "</tr>";
    }
    echo "</table>";
});