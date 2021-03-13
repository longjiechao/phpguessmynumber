<?php
    abstract class Game{
        protected $dificultad;
        protected $minN = 1;
        protected $maxN;
        protected $countN = 0;
        protected $type;
        
        public function __construct($dificultad){
            $this->dificultad = $dificultad;
            if($dificultad == "facil"){
                $this->maxN = 10;
            }else if($dificultad == "normal"){
                $this->maxN = 50;
            }else if($dificultad == "dificil"){
                $this->maxN = 100;
            }
        }
        public function incrementarCount(){
            $this->countN++;
        }
        public function getCount(){
            return $this->countN;
        }
        public function getDiff(){
            return $this->dificultad;
        }
        public function getMin(){
            return $this->minN;
        }
        public function getMax(){
            return $this->maxN;
        }
        abstract public function generarNumero();
        abstract public function setType();

    }

    class GameUsuario extends Game{
        private $randN;
        public function __construct($dificultad){
            parent::__construct($dificultad);
            $this->generarNumero();
            $this->setType();
        }
        public function generarNumero(){
            $this->randN = rand($this->minN, $this->maxN);
        }
        public function isAcertado($nUsuario){
            $this->incrementarCount();
            if($this->randN == $nUsuario){
                echo "Es correcto";
                return true;
            }else{
                if($this->randN > $nUsuario){
                    echo "Número no correcto, el número es más grande";
                }else{
                    echo "Número no correcto, el número es más pequeño";
                }
                return false;
            }
        }
        public function setType(){
            $this->type = "user";
        }
        public function getType(){
            return $this->type;
        }
    }
    
    class GameMaquina extends Game{
        private $num = 0;
        private $resultado = -1;

        public function __construct($dificultad){
            parent::__construct($dificultad);
            $this->setType();
        }
        public function setNum($num){
            $this->num = $num; 
        }
        public function getNum(){
            return $this->num;
        }
        
        public function setResultadoFinal(){
            $this->resultado = $this->adivinar();
        }
        public function getResultado(){
            return $this->resultado;
        }
        public function adivinar(){
            $loop = true;
            echo "MAX: ", $this->maxN, " MIN: ", $this->minN, "<br>";
            while($loop){
                $this->incrementarCount();
                $this->randNum = $this->generarNumero();
                if($this->num > $this->randNum){
                    $this->minN = $this->randNum+1;
                }else if($this->num < $this->randNum){
                    $this->maxN = $this->randNum-1;
                }else{
                    $this->loop = false;
                    return $this->randNum;
                }
                echo "RAND: ", $this->randNum, "<br>";
                echo "MAX: ", $this->maxN, " MIN: ", $this->minN, "<br>";
            }
        }
        public function generarNumero(){
            return rand($this->minN, $this->maxN);
        }
        public function setType(){
            $this->type = "machine";
        }
        public function getType(){
            return $this->type;
        }
    }
?> 