<?php

class jogador{
    public $jogador;
    public $camiseta;
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

    public function cadastrar(){
        $sql = "INSERT INTO saopaulofutebolclube(jogador,camiseta,nascimento,gols,valor,salario) values (:jogador, :camiseta, :nascimento, :gols,:valor,:salario)";
        $stmt = $this->bd->prepare($sql);
        $stmt -> bindparam(':jogador', $this->jogador, PDO::PARAM_STR); 
        $stmt -> bindparam(':camiseta', $this->camiseta, PDO::PARAM_STR); 
        $stmt -> bindparam(':nascimento', $this->nascimento, PDO::PARAM_STR); 
        $stmt -> bindparam(':gols', $this->gols, PDO::PARAM_STR); 
        $stmt -> bindparam(':valor', $this->valor, PDO::PARAM_STR); 
        $stmt -> bindparam(':salario', $this->salario, PDO::PARAM_STR); 

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
}


?>