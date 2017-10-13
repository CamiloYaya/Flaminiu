<?php

include_once 'aplicacion/conexion.inc.php';
include_once 'aplicacion/config.inc.php';

include_once 'aplicacion/usuario.inc.php';


include_once 'aplicacion/repositoriousuario.inc.php';


$componentes_url = parse_url($_SERVER['REQUEST_URI']);

$ruta = $componentes_url['path'];

$partes_ruta = explode('/', $ruta);
$partes_ruta = array_filter($partes_ruta);
$partes_ruta = array_slice($partes_ruta, 0);

$ruta_elegida = 'vistas/404.php';

if($partes_ruta[0] == 'evaneno'){
    if(count($partes_ruta) == 1){
        $ruta_elegida = 'vistas/home.php';
    } else if (count($partes_ruta) == 2){
        switch ($partes_ruta[1]){
            case 'login':
                $ruta_elegida = 'vistas/login.php';
                break;
            case 'logout':
                $ruta_elegida = 'vistas/logout.php';
                break;
            case 'registro':
                $ruta_elegida = 'vistas/registro.php';
                break;
            case 'relleno-dev':
                $ruta_elegida = 'vistas/script-relleno.php';
                break;
                case 'chat-geo':
                $ruta_elegida = 'vistas/chat-geo.php';
                break;
               
        }
    }else if (count($partes_ruta) == 3){
        if ($partes_ruta[1] == 'registro-correcto'){
            $nombre = $partes_ruta[2];
            $ruta_elegida = 'vistas/registro-correcto.php';
        }
        }
    }


include_once $ruta_elegida;
