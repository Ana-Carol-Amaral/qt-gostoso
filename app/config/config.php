<?php

define('BASE', '/quase-tudo-gostoso/');

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '1234');
define('DB_NAME', 'qt_gostoso');

$router = [
    /* VIEW */ 
    'home'   => 'HomeController@index',
    'nova'   => 'ReceitaController@nova',
    'editar' => 'ReceitaController@editar',
    'ver'    => 'ReceitaController@ver',
    'busca'  => 'ReceitaController@busca',
    /* INTERNAL */
    'delete' => 'ReceitaController@delete',
    'insert' => 'ReceitaController@insert',
    'update' => 'ReceitaController@update'
];
