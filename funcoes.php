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

function procurar(){
    global $procurarJogador;
    $banco = new database();
    $bd = $banco ->conectar();
    $a = new jogador($bd);
    if(isset($_POST['procurar'])){
        $procurarJogador = $a->lerJogador($_POST['procurar']);

    };

    
}

if(isset($_POST['cadastrar'])){
    $a->id = $_POST['id'];
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

if(isset($_GET['deletar'])){
    $a->id = $_GET['deletar'];
    if($a->deletar()){
        header("Location: index.php");
    }
}

if(isset($_POST['atualizar'])){
    $a->id = $_POST['id_atualizar'];
    $a->jogador = $_POST['jogador_atualizar'];
    $a->camiseta = $_POST['camiseta_atualizar'];
    $a->nascimento = $_POST['nascimento_atualizar'];
    $a->gols = $_POST['gols_atualizar'];
    $a->valor = $_POST['valor_atualizar'];
    $a->salario = $_POST['salario_atualizar'];
    
    if($a->atualizar()){
        header("Location:index.php");
    }
}

