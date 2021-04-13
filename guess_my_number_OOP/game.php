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
        public function setMin($min){
            $this->minN = $min;
        }
        public function getMax(){
            return $this->maxN;
        }
        public function setMax($max){
            $this->maxN = $max;
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
        private $rand = -1;
        private $num = 0;
        private $resultado = -1;

        public function __construct($dificultad){
            parent::__construct($dificultad);
            $this->setType();
        }
        
        public function setRand($rand){
            $this->rand = $rand;
        }
        public function getRand(){
            return $this->rand;
        }
        public function genRand(){
            if($this->rand == -1){
                $this->rand = $this->maxN/2;
            }else{
                $this->rand = rand($this->minN, $this->maxN);
            }
        }
        public function setNum($num){
            $this->num = $num; 
        }
        public function getNum(){
            return $this->num;
        }
        
        public function setResultadoFinal(){
            $this->resultado = $this->rand;
        }
        public function getResultado(){
            return $this->resultado;
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
        public function isfinalCheck(){
            if($this->minN == $this->maxN || $this->minN > $this->maxN){
                return true;
            }else{
                return false;
            }
        }
    }
?> 