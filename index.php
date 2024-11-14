<a href="cadastro.php">cadastrar</a>

<?php

include_once 'configs/database.php';
include_once 'objetos/jogadores.php';
include_once 'funcoes.php';



$banco = new database();
$bd = $banco->conectar();
$jogador = new jogador($bd);
global $jogador;
index();


if ($jogador) {

  echo '<table class="table">
    <thead>
       <tr>
        <th scope="col">JOGADOR</th>
        <th scope="col">NUMERO DA CAMISA</th>
        <th scope="col">DATA NASCIMENTO</th>
        <th scope="col">GOLS FEITOS</th>
        <th scope="col">VALOR PAGO</th>
        <th scope="col">SALARIO</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
      <tbody>';
  foreach ($jogador as $infos) {
    echo "<tr>
    <td>$infos->Id</td>
    <td>$infos->Jogador</td>
    <td>$infos->NumeroCamiseta </td>
    <td>$infos->Nascimento</td>
    <td>$infos->GolsFeitos</td>
    <td>$infos->ValorCompra</td>
    <td>$infos->Salario</td>
    <td><a href= 'funcoes.php?deletar= $infos->Jogador'>deletar</a></td><br>
    <td><a href= 'atualizar.php?atualizar= $infos->Jogador'>atualizar</a></td><br>
    </tr>";
  }
  echo '</tbody>';
  echo '</table>';
}

if(isset($_POST['jogador'])){
  foreach($futebol->lerDados($_POST['jogador']) as $saopaulo){
    echo "<p>". $saopaulo->jogador . "</p>";
  }
}

?>

<form action="">
  <input type="text" name="jogador">
  <button name="buscar">buscar</button>
</form>




<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>sao paulo fc</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>