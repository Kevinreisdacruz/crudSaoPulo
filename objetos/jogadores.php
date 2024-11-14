<?php

class jogador{
    public $id;
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

    // public function lerJogador($jogador){
    //    $jogador = "%" . $jogador . "%";
    //    $sql = "SELECT * FROM saopaulofutebolclube WHERE  Jogador LIKE :Jogador;";
    //    $resultado = $this->bd->prepare($sql);
    //    $resultado ->bindparam(':Jogador', $jogador);
    //    $resultado ->execute();
        
    //     return $resultado->fetchALL(PDO::FETCH_OBJ) ;
    // }

    public function lerJogador($id){
        $sql = "SELECT * FROM saopaulofutebolclube WHERE Id LIKE :Id;";
        $resultado = $this->bd->prepare($sql);
        $resultado ->bindparam(':Id', $id);
        $resultado ->execute();
         
        return $resultado->fetchALL(PDO::FETCH_OBJ);
    }

    public function cadastrar(){
        $sql = "INSERT INTO saopaulofutebolclube(Jogador,NumeroCamiseta,Nascimento,GolsFeitos,ValorCompra,Salario) values (:Jogador, :NumeroCamiseta, :Nascimento, :GolsFeitos,:ValorCompra,:Salario)";
        $stmt = $this->bd->prepare($sql);
        $stmt -> bindparam(':Jogador', $this->jogador, PDO::PARAM_STR); 
        $stmt -> bindparam(':NumeroCamiseta', $this->camiseta, PDO::PARAM_STR); 
        $stmt -> bindparam(':Nascimento', $this->nascimento, PDO::PARAM_STR); 
        $stmt -> bindparam(':GolsFeitos', $this->gols, PDO::PARAM_STR); 
        $stmt -> bindparam(':ValorCompra', $this->valor, PDO::PARAM_STR); 
        $stmt -> bindparam(':Salario', $this->salario, PDO::PARAM_STR); 

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    // public function deletar(){
    //     $sql = "DELETE FROM saopaulofutebolclube where Jogador = :Jogador";
    //     $stmt = $this ->bd->prepare($sql);
    //     $stmt -> bindparam(':Jogador', $this->Jogador);

    //     if($stmt->execute()){
    //         return true;
    //     }else{
    //         return false;
    //     }

    // }


    public function atualizar(){
        $sql = "UPDATE saopaulofutebolclube SET Jogador = :Jogador,NumeroCamiseta = :NumeroCamiseta, Nacimento = :Nascimento, GolsFeitos = GolsFeitos, ValorCompra = :ValorCompra, Salario = :Salario WHERE Id = :Id";
        $stmt = $this ->bd->prepare($sql);
        $stmt -> bindparam(':Id', $this->id, PDO::PARAM_STR);
        $stmt -> bindparam(':Jogador', $this->jogador, PDO::PARAM_STR);
        $stmt -> bindparam(':NumeroCamiseta', $this->camiseta, PDO::PARAM_STR);
        $stmt -> bindparam(':Nascimento', $this->nascimento, PDO::PARAM_STR);
        $stmt -> bindparam(':GolsFeitos', $this->gols, PDO::PARAM_STR);
        $stmt -> bindparam(':ValorCompra', $this->valor, PDO::PARAM_STR);
        $stmt -> bindparam(':Salario', $this->salario, PDO::PARAM_STR);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
}


?>