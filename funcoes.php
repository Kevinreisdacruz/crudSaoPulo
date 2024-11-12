<?php

include_once 'configs/database.php';
include_once 'objetos/jogadores.php';

$banco = new database();
$bd = $banco->conectar();
$a = new jogador($bd);
$jogador = null;

function index(){
    global $jogador;
    $banco = new database();
    $bd = $banco ->conectar();
    $a = new jogador($bd);
    $jogadores = $a->lerDados();
}

