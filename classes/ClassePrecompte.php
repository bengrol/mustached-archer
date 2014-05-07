<?php

class ClassePrecompte {
    private $idPrecompte;   private $nbJourTravaille;  private $nbFOAnnonce; private $nbFORecu;  private $nbFORetourne; private $nbFOValide;
    private $CAmois;  private $nbVente;  private $nbMBP; private $rembFrais;  private $primePalier;  private $primeAnimation; private $autrePrime; private $datePrecompte;
    private $nbArguBinome; private $nbArguPerso;  private $totalFO;
    
  private $comMBP; private $TxComCAHT; private $comArgusTxPlein; private $comArgusTxReduit; private $TxComDR;
  private $TxComAR; private $seuilComFO; private $maxFObinome; private $fixeManager; private $txTVA; private $comFraisFO;
 private  $conx; private $txComFraisFO;
 
 private $ObservPrimePalier;
 private $ObservRembFrais;
 private $ObservAutrePrime;
 private $idStatutPrecompteIndex;
         
         
    function __construct($id) {
        $outil = new ClasseOutils();
        $this->conx = $outil->connection();
        $prepare = $this->conx->prepare("select * ,  DATE_FORMAT(`datePrecompte`, '%d/%m/%Y') as dateFormat "
                . "from `precompte` where `idPrecompte`=:id");
        $prepare->execute(array('id' => $id['id']));
        $ligne = $prepare->fetch(PDO::FETCH_OBJ); 
        $this->CAmois = floatval($ligne->CA_HT);
        $this->autrePrime= floatval($ligne->autrePrime);
        $this->datePrecompte=  $ligne->dateFormat;
        $this->idPrecompte=  intval($ligne->idPrecompte);
        $this->nbArguBinome= intval($ligne->nbArguBinome);
        $this->nbArguPerso= intval($ligne->nbArguPerso);
        $this->nbFOAnnonce= intval($ligne->nbFOannonce);
        $this->nbFORecu= intval($ligne->nbFOrecu);
        $this->nbFORetourne= intval($ligne->nbFOretour);
        $this->nbFOValide= $this->nbFORecu-$this->nbFORetourne;
        $this->nbJourTravaille= intval($ligne->nbJourDeclare);
        $this->nbMBP=  intval($ligne->nbMBP);
        $this->nbVente=  intval($ligne->nbVente);
        $this->primePalier=floatval($ligne->PrimePalier);
        $this->rembFrais=floatval($ligne->rembourseFrais);
            if($id["new" ]==ok ){
                $prepare = $this->conx->prepare("SELECT * FROM  `paramInit` where 1");
                $prepare->execute();
                $ligne = $prepare->fetch(PDO::FETCH_OBJ); 
            }   
        $this->comMBP = floatval($ligne->comMBP);
        $this->TxComCAHT = floatval($ligne->TxComCAHT);
        $this->comArgusTxPlein = floatval($ligne->comArgusTxPlein);
        $this->comArgusTxReduit = floatval($ligne->comArgusTxReduit);
        $this->TxComDR = floatval($ligne->TxComDR);
        $this->TxComAR = floatval($ligne->TxComAR);
        $this->seuilComFO = floatval($ligne->seuilComFO);
        $this->maxFObinome = floatval($ligne->maxFObinome);
        $this->fixeManager = floatval($ligne->fixeManager);
        $this->txTVA = floatval($ligne->txTVA);
        $this->comFraisFO= floatval($ligne->comFraisFO);
        $this->txComFraisFO=  floatval($ligne->txComFraisFO);
        
        $this->ObservPrimePalier = $ligne->ObservPrimePalier;
        $this->ObservRembFrais = $ligne->ObservRembFrais;
        $this->ObservAutrePrime = $ligne->ObservAutrePrime;
        $this->idStatutPrecompteIndex = $ligne->idStatutPrecompteIndex;
        
     //  var_dump($this);
        }
    public function checkParam($param) {
        foreach ($param as &$value) {
            if ($value == null) {
                $value = 'null';
            }
        }
        return $param;
    }

    public function createPrecompte($param) {
       $param = $this->checkParam($param);
       $outil = new ClasseOutils();
       $query="INSERT INTO `precompte`(" 
               . "`datePrecompte` , `idSalarie`, `nbJourDeclare`, `nbFOannonce`, `nbFOrecu`, "
               . "`nbFOretour`, `nbArguBinome`,  `nbArguPerso`, `CA_HT`, `nbVente`, "
               . "`nbMBP`,`rembourseFrais`,`PrimePalier`, `PrimeAnimation`, `annulationHT`,`autrePrime`,`editable`,"
               . "`comMBP`, `TxComCAHT`, `comArgusTxPlein`, `comArgusTxReduit`, `TxComDR`, `TxComAR`,"
               . " `seuilComFO`, `maxFObinome`, `fixeManager`, `txTVA`, `comFraisFO`,"
               . " `idStatutPrecompteIndex` , `txComFraisFO`,"
               . "`ObservPrimePalier`, `ObservRembFrais`,`ObservAutrePrime`  "
               . ") VALUES ('"
               .$outil->getDateJour()."',".$param['id']."," .$param['nbJourDeclare'].", "
               .$param['nbFOannonce'].","  .$param['nbFOrecu'].", " .$param['nbFOretour'].","
               .$param['nbArguBinome'].", " .$param['nbArguPerso'].", ".$param['CA_HT'].", "
               .$param['nbVente'].", " .$param['nbMBP'].", " .$param['rembourseFrais'].", "
               .$param['PrimePalier'].", ".$param['PrimeAnimation'].", " 
               
               .$param['annulationHT']."," .$param['autrePrime'].","  .$param['editable'].","
               .$param['comMBP']."," .$param['TxComCAHT']."," .$param['comArgusTxPlein']."," 
               .$param['comArgusTxReduit']."," .$param['TxComDR']."," .$param['TxComAR'].","
               .$param['seuilComFO']."," .$param['maxFObinome'].",".$param['fixeManager'].","
               .$param['txTVA']."," .$param['comFraisFO'].", "
               .$param['idStatutPrecompteIndex']." , ".$param['txComFraisFO']." ,"
               .$param['ObservPrimePalier']." , ".$param['ObservRembFrais']." , ".$param['ObservAutrePrime']."   )";
      //  print_r($query);
        $outil->connection()->exec($query);
    }
    
    function updatePrecompte($param, $idprecompte) {
        $param = $this->checkParam($param); $outil = new ClasseOutils();
        $query="UPDATE `precompte` SET ". " `datePrecompte` = '".$outil->getDateJour()."'," . " `idSalarie`= ".$param['id']."," . " `nbJourDeclare` = " .$param['nbJourDeclare']."," . " `nbFOannonce` = ".$param['nbFOannonce']."," . " `nbFOrecu` = ".$param['nbFOrecu'].","
               . " `nbFOretour` = ".$param['nbFOretour']."," . " `nbArguBinome` = ".$param['nbArguBinome']."," . " `nbArguPerso` = ".$param['nbArguPerso']."," . " `CA_HT` = ".$param['CA_HT']."," . " `nbVente` = ".$param['nbVente']."," . " `nbMBP` = ".$param['nbMBP']."," . " `rembourseFrais` = ".$param['rembourseFrais']." ,"
               . " `PrimePalier` = ".$param['PrimePalier']." ," . " `PrimeAnimation` = ".$param['PrimeAnimation']." ," . " `annulationHT` = ".$param['annulationHT']."," . " `autrePrime` = ".$param['autrePrime']." ,"  . " `editable` = ".$param['editable'].","
               . " `comMBP` = ".$param['comMBP']."," . " `TxComCAHT` = ".$param['TxComCAHT']."," . " `comArgusTxPlein` = ".$param['comArgusTxPlein']."," . " `comArgusTxReduit` = ".$param['comArgusTxReduit']."," . " `TxComDR` = ".$param['TxComDR'].","
               . " `TxComAR` = ".$param['TxComAR']."," . " `seuilComFO` = ".$param['seuilComFO']."," . " `maxFObinome` = ".$param['maxFObinome']."," . " `fixeManager` = ".$param['fixeManager'].","
               . " `txTVA` = ".$param['txTVA'].",". " `comFraisFO` = ".$param['comFraisFO']."," . " `ObservPrimePalier`= '".$param['ObservPrimePalier']."' , " . " `ObservRembFrais` = '".$param['ObservRembFrais']."' ," . " `ObservAutrePrime` = '".$param['ObservAutrePrime']."' ," . " `idStatutPrecompteIndex` = ".$param['idStatutPrecompteIndex'];
     
        $prepare= $outil->connection()->prepare($query." WHERE `idPrecompte` = :id; ");
        $prepare->execute(array('id'=>$idprecompte));
        }
    
    
    public function getJson(){
        $outil = new ClasseOutils();  $this->conx = $outil->connection();
        $prepare = $this->conx->prepare("select * ,  DATE_FORMAT(`datePrecompte`, '%d/%m/%Y') as dateFormat ". "from `precompte` where `idPrecompte`=:id");
        $prepare->execute(array('id' => $this->idPrecompte));
        $obj = $prepare->fetch(PDO::FETCH_ASSOC);
        return json_encode($obj);
    }
    public function getIdPrecompte() {
        return $this->idPrecompte;
    }
    public function getIdStatutPrecompteIndex() {
        return $this->idStatutPrecompteIndex;
    }
}