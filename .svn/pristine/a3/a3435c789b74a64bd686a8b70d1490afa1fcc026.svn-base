<?php
class ClasseOutils {
    private $mois;
    public static $tauxPleinFO;
    public static $tauxReduitFO;
    private $calendar= array(
        1 => "janvier",
        2=>"Février",    
        3=>"Mars",    
        4=>"Avril",    
        5=>"Mai",    
        6=>"Juin",    
        7=>"Juillet",    
        8=>"Aout",    
        9=>"Septembre",    
        10=>"Octobre",    
        11=>"Novembre",    
        12=>"Decembre");
            
    function __construct() {

    }
    
    function getDateCour(){
      date_default_timezone_set('UTC');
      $this->mois = date('m');
      $i = intval($this->mois);
      $moisEncour = $this->calendar[$i];
        
      return $moisEncour;
    }
    
    function getDateJour(){
      date_default_timezone_set('UTC');
      $dateJour = date('y-m-d');
      return $dateJour;
    }
    
    function connection (){
        $PARAM_hote ="localhost";  $PARAM_nom_bd="paysystemDB"; $PARAM_utilisateur="root";
        $PARAM_mot_passe="root";
        
        try {
            $connexion = new PDO('mysql:host=' . $PARAM_hote . ';dbname=' . $PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
           return $connexion;
        } catch(Exception $e){ echo 'Erreur : '.$e->getMessage().'<br /> N° : '.$e->getCode(); }
        
    }
    
    
       public function getInfoAllAnimatrices() {
        
        $connexion = $this->connection();
        $prepare = $connexion->prepare("SELECT * FROM `salarie` WHERE `actif` =1;");
        $prepare->execute();
        $liste = array();
        while ($ligne = $prepare->fetch(PDO::FETCH_OBJ)) {
            array_push($liste, $ligne);
        }
       // var_dump($liste);
        return $liste;
    }
    
    
    function supprimePrecompte($param) {
        if (!is_int($param)) {
            throw new Exception('Probleme de suppression paramettre = '.$param);
        }else{
        
        $query = " DELETE FROM `paysystemDB`.`precompte` WHERE `precompte`.`idPrecompte` = :id";
        $connexion = $this->connection();
        $prepare = $connexion->prepare($query);
        $prepare->execute(array('id' => $param));
        
            
        }
        //print_r($query);
    }
   
    
        public function getAllStatutPrecompte() {
        
        $connexion = $this->connection();
        $prepare = $connexion->prepare("SELECT * FROM `statutPrecompte` where `idStatutPrecompte` <3");
        $prepare->execute();
        $liste = array();
        while ($ligne = $prepare->fetch(PDO::FETCH_ASSOC)) {
            array_push($liste, $ligne);
        }
       // var_dump($liste);
        return $liste;
    }
        
    public function getAllPrecompteExport($st) {
         $connexion = $this->connection();
        $prepare = $connexion->prepare("SELECT `idPrecompte`, `datePrecompte`, `idSalarie` FROM  `precompte` WHERE `editable`=1 and `idStatutPrecompteIndex` =:statut;");
        $prepare->execute(array(
            'statut'=>$st
        ));
        $liste = array();
        while ($ligne = $prepare->fetch(PDO::FETCH_ASSOC)) {
            array_push($liste, $ligne);
        }
        return $liste;
    }
     public function getAllPrecompteExportJson($st) {
        $connexion = $this->connection();
        $prepare = $connexion->prepare(""
                . "SELECT `precompte`.`idPrecompte`, "
                . "`precompte`.`datePrecompte`, "
                . "`precompte`.`idSalarie` ,"
                . "`salarie`.`nom` "
                . " FROM `precompte` "
                . " LEFT JOIN  `salarie` ON `precompte`.`idSalarie`=`salarie`.`id` "
                . " WHERE `idStatutPrecompteIndex` =:statut;");
        
        $prepare->execute(array('statut'=>$st ));
        $ligne = $prepare->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($ligne);
    }
    
    public function getInfoAllAnimatricesJson() {
        $connexion = $this->connection();
        $prepare = $connexion->prepare(""
                . " SELECT `salarie`.`id`,`salarie`.`nom`, `salarie`.`prenom`, `statut`.`label` "
                . " FROM `salarie` "
                . " LEFT JOIN `statut` ON `statut`.`id`=`salarie`.`statutId` "
                . " WHERE `actif` =1"
                . " ORDER BY  `salarie`.`nom` ASC;");
        $prepare->execute();
        $ligne = $prepare->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($ligne);
    }
    
    public function getAllStatutAnimJson() {
        $connexion = $this->connection();
        $prepare = $connexion->prepare("SELECT * FROM  `statut`");
        $prepare->execute();
        $ligne = $prepare->fetchAll(PDO::FETCH_ASSOC);
       // var_dump($liste);
        return json_encode($ligne);
        }
    public function getInfoAllAnimatricesLite() {
        $connexion = $this->connection();
        $prepare = $connexion->prepare("SELECT `id`, `nom` FROM `salarie` WHERE `actif` =1 ORDER BY  `salarie`.`nom` ASC;;");
        $prepare->execute();
        $liste = array();
        while ($ligne = $prepare->fetch(PDO::FETCH_OBJ)) {
            array_push($liste, $ligne);
        }
        // var_dump($liste);
        return $liste;
    }

    public function changeEquipe($anim, $equip){
        $query = "UPDATE `salarie` SET `idResponsable`= :idResponsable  WHERE `id`=:id";
        if($equip=='null'){
            $equip = null;
        }
        $connexion = $this->connection();
        $prepare = $connexion->prepare($query);
        $prepare->execute(array(
            'id' => $anim,
            'idResponsable' => $equip
                ));
        var_dump($query);
    }
    
    public function getEquipeParStatut($statut) {
        $connexion = $this->connection();
        $prepare = $connexion->prepare("SELECT `salarie`.`id`, `salarie`.`nom` , `statut`.`label` "
                . " FROM `salarie` "
                . " LEFT JOIN `statut` ON `statut`.`id`=`salarie`.`statutId`"
                . " WHERE `actif` =1 and `statutId`=:statut");
        $prepare->execute(array('statut'=>$statut));
        $liste = array();
        while ($ligne = $prepare->fetch(PDO::FETCH_OBJ)) { array_push($liste, $ligne); }
       // var_dump($liste);
        return $liste;
    }
    public function getListeVRPParResponsable($idResponsable,$option) {
        $query = "SELECT `salarie`.`id`, `salarie`.`nom` , `statut`.`label` FROM `salarie` "
                . " LEFT JOIN `statut` ON `statut`.`id`=`salarie`.`statutId` ";
            if($option == 0){
              $query .= "WHERE `salarie`.`idResponsable` is null and `salarie`.`statutId` = 1 ";
              }else {
                  $query .= "WHERE `salarie`.`idResponsable`=:id";
                  }
        $connexion = $this->connection();
        $prepare = $connexion->prepare($query);
            if($option == 0){
              $prepare->execute();
            } else {
                  $prepare->execute(array('id'=>$idResponsable));
                  }
        $liste = array();
        while ($ligne = $prepare->fetch(PDO::FETCH_OBJ)) { array_push($liste, $ligne); }
       // var_dump($liste);
        return $liste;
    }

}