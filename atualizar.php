<?php
include_once 'configs/database.php';
include_once 'objetos/jogadores.php';
include_once 'funcoes.php';

$banco = new database();
$bd = $banco->conectar();
$jogador = new jogador($bd);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    foreach($jogador->lerJogador($_GET["atualizar"]) as $infos){

        echo '<form action="funcoes.php" method="post">
        <input type="text" name="jogador" value="'. $infos->Id.'"><br><br>
        <input type="text" name="jogador" value="'. $infos->Jogador.'"><br><br>
        <input type="text" name="camiseta" value="'. $infos->NumeroCamiseta.'"><br><br>
        <input type="text" name="nascimento" value="'. $infos->Nascimento.'"><br><br>
        <input type="text" name="gols" value="'. $infos->GolsFeitos.'"><br><br>
        <input type="text" name="valor" value="'. $infos->ValorCompra.'"><br><br>
        <input type="text" name="salario" value="'. $infos->Salario.'"><br><br>';

        echo '<button name="atualizar">atualizar</button>';
        
        echo "</form>";
        
    }
?>
    
</body>
</html>