<?php
class ClasseTVA {
    public static $taux1 = 12;
    private $taux2;
    
    function __construct($tx2) {
        //$this->taux1=$tx1;
        $this->taux2=$tx2;
    }



    public function getTaux2() {
        return $this->taux2;
    }


    
    
}

