<?php
function setHeaderActive(string $ruta): string {
    return request()->routeIs($ruta) ? '' : 'text-decoration-none';
}

function isLogged(){
    return auth()->check();
}

function hasRol(string ...$rols){
    if(!isLogged()){return false;}
    foreach ($rols as $rol) {
        if(auth()->user()->rol === $rol){
            return true;
        }
    }
    return false;
}