<?php

class database{
    private $host = "localhost:3308";
    private $banco = "saopaulo";
    private $usuario = "root";
    private $senha = "";
    private $con;

    
    public function conectar(){
        $this -> con = null;
        
        try{
            $this -> con = new PDO("mysql:host=$this->host; dbname=$this->banco", $this->usuario, $this->senha);
        }catch(PDOException $e){
            echo "erro".$e -> getMessage();
        }
        return $this-> con;
    }
}

?>