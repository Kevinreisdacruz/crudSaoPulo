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
        <input type="text" name="id_atualizar" value="'. $infos->Id.'"><br><br>
        <input type="text" name="jogador_atualizar" value="'. $infos->Jogador.'"><br><br>
        <input type="text" name="camiseta_atualizar" value="'. $infos->NumeroCamiseta.'"><br><br>
        <input type="text" name="nascimento_atualizar" value="'. $infos->Nascimento.'"><br><br>
        <input type="text" name="gols_atualizar" value="'. $infos->GolsFeitos.'"><br><br>
        <input type="text" name="valor_atualizar" value="'. $infos->ValorCompra.'"><br><br>
        <input type="text" name="salario_atualizar" value="'. $infos->Salario.'"><br><br>';

        echo '<button name="atualizar">atualizar</button>';
        
        echo "</form>";
        
    }
?>
    
</body>
</html>