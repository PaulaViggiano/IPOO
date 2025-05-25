<?php


class Reloj{

    private $segundo;
    private $minuto;
    private $hora;

    public function __construct($hora, $minuto, $segundo){
        $this -> segundo = $segundo;
        $this -> minuto = $minuto;
        $this -> hora = $hora;
    }

    public function getSegundo(){
        return $this -> segundo;
    }

    public function getMinuto(){
        return $this -> minuto;
    }

    public function getHora(){
        return $this -> hora; 
    }

    public function setSegundo($segundo){
        $this -> segundo = $segundo;
    }

    public function setMinuto($minuto) {
        $this -> minuto = $minuto;
    }

    public function setHora($hora) {
        $this -> hora = $hora;
    }

    public function puesta_a_cero(){
        $this -> setSegundo(0);
        $this -> setMinuto(0);
        $this -> setHora(0);
    }

    public function incrementar() {
    
        if ($this -> getHora() < 24) {
            if ($this -> getSegundo() < 59) {
                $this -> setSegundo($this -> getSegundo() + 1);

            } else {
                $this -> setSegundo(0);
                if ($this -> getMinuto() < 59) {
                    $this -> setMinuto($this -> getMinuto() + 1);
            } else {
                $this -> setMinuto(0);
                $this -> setHora($this -> getHora() + 1);
                
            }
                    
            }
            
            
        }
        
    }

    public function contador() {
        while($this -> getHora() < 24){
            echo $this -> __toString() . "\n";
            $this -> incrementar();           
        }

        $this -> puesta_a_cero();
        echo $this -> __toString() . "\n" ;

    }

    public function __toString() {
        return $this -> getHora() . ":" . $this -> getMinuto() . ":" . $this-> getSegundo() . " segundo" ;
    }
    
}

?>