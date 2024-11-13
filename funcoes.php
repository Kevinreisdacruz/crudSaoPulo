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
    $jogador = $a->lerDados();
}

if(isset($_POST['cadastrar'])){
    $a->jogador = $_POST['jogador'];
    $a->camiseta= $_POST['camiseta'];
    $a->nascimento = $_POST['nascimento'];
    $a->gols = $_POST['gols'];
    $a->valor = $_POST['valor'];
    $a->salario= $_POST['salario'];

    if($a->cadastrar()){
        header("Location:index.php");
    }
}

