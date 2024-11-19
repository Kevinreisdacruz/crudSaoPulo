<?php
include_once 'configs/database.php';
include_once 'objetos/jogadores.php';
include_once 'funcoes.php';

$banco = new database();
$bd = $banco->conectar();
$jogador = new jogador($bd);

$att = $jogador->lerJogador($_GET["atualizar"]);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    

        <form action="funcoes.php" method="post">
        <input type="text" name="id_atualizar" value="<?php echo $att[0]->Id?>">
        <input type="text" name="jogador_atualizar" value="<?php echo $att[0]->Jogador?>">
        <input type="text" name="camiseta_atualizar" value="<?php echo $att[0]->NumeroCamiseta?>">
        <input type="text" name="nascimento_atualizar" value="<?php echo $att[0]->Nascimento?>">
        <input type="text" name="gols_atualizar" value="<?php echo $att[0]->GolsFeitos?>">
        <input type="text" name="valor_atualizar" value="<?php echo $att[0]->ValorCompra?>">
        <input type="text" name="salario_atualizar" value="<?php echo $att[0]->Salario?>">

        <button name="atualizar">atualizar</button>
        
        </form>
        
    
    
</body>
</html>