<?php

class jogador{
    public $nome;
    public $nascimento;
    public $gols;
    public $valor;
    public $salario;
    public $bd;


    public function __construct($bd){
        $this ->bd = $bd;
    }


    public function lerDados(){
        $sql = "SELECT * FROM saopaulofutebolclube";
        $resultado = $this->bd->query($sql);
        $resultado->execute();
        $resultado = $resultado -> fetchALL(PDO::FETCH_OBJ);

        return $resultado;
    }

    public function lerJogador($jogador){
        $sql = "SELECT * FROM saopaulofutebolclube WHERE jogador like :jogador;";
        $resultado = $this->bd->query($sql);
        $resultado->bindparam(':jogador', $jogador);
        $resultado->execute();
        
        return $resultado->fetchALL(PDO::FETCH_OBJ) ;
    }
}


?>