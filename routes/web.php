<?php

use App\Http\Controllers\CortosController;
use App\Http\Controllers\DirectoresController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name("home");

foreach ([UserController::class, CortosController::class, DirectoresController::class] as $class) {
    $name = $class::$name;
    Route::get("$name/action", "$class@action")->name("$name.action");
    Route::resource($name, $class)->parameter($name, $name);//->only(["index","show", "destroy"]);
}

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