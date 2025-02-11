<?php
function setHeaderActive(string $ruta): string {
    return request()->routeIs($ruta) ? '' : 'text-decoration-none';
}