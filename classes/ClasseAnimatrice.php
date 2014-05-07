<?php

//require './ClassePrecompte.php';
class ClasseAnimatrice {

    private $id;
    private $nom;
    private $prenom;
    private $dateEntre;
    private $dateSortie;
    private $statut;
    private $responsable;
    private $listePrecompte = array();
    private $listeEquipe = array();
    private $responsableId;

    function __construct($id) {

        $ligne = $this->getInfoAnimatrice($id);
        $this->id = $ligne->id;
        $this->nom = $ligne->nom;
        $this->prenom = $ligne->prenom;
        $this->dateEntre = $ligne->dateEntreForm;
        $this->dateSortie = $ligne->dateSortie;
        $this->statut = $ligne->label;
        $this->responsableId = $ligne->idResponsable;
        $this->responsable = $ligne->RESP;

        //idResponsable

        $this->getAllPrecompte($id);
        $this->iniListEquipe();

          // var_dump($ligne);
    }

    public function getInfoAnimatrice($id) {
        $outil = new ClasseOutils();
        $connexion = $outil->connection();
        $prepare = $connexion->prepare("
            SELECT `salarie`.*,  DATE_FORMAT(`salarie`.`dateEntre`, '%d/%m/%Y') as dateEntreForm,  `statut`.`label` ,  `resp`.`nom` as `RESP`
            FROM `salarie`	
            LEFT JOIN  `salarie` as `resp` ON   `resp`.`id`=`salarie`.`idResponsable`
            LEFT JOIN   `statut` ON   `salarie`.`statutId`=`statut`.`id`
            WHERE `salarie`.`id`=:id ");
        $prepare->execute(array('id' => $id));
        $ligne = $prepare->fetch(PDO::FETCH_OBJ);
//        echo'getInfoAnimatrice';
//     var_dump($ligne);
        return $ligne;
    }

    public function getInfoAllAnimatrices() {
        $outil = new ClasseOutils();
        $connexion = $outil->connection();
        $prepare = $connexion->prepare("SELECT * FROM `salarie` WHERE `actif` =1;");
        $prepare->execute();
        $liste = array();
        while ($ligne = $prepare->fetch(PDO::FETCH_OBJ)) {
            array_push($liste, $ligne);
        }
        // var_dump($liste);
        return $liste;
    }

    public function getAllPrecompte() {
        $outil = new ClasseOutils();
        $connexion = $outil->connection();
        $prepare = $connexion->prepare(" SELECT `idPrecompte` , DATE_FORMAT(`datePrecompte`, '%d/%m/%Y') as DateForm , `editable` FROM `precompte`  where `idSalarie`=:idSalarie ORDER BY  `idPrecompte` DESC ;");
        $prepare->execute(array('idSalarie' => $this->id));

        while ($ligne = $prepare->fetch(PDO::FETCH_ASSOC)) {
            array_push($this->listePrecompte, $ligne);
        }
    }

    public function updateInfo($param) {
        
        if($param['idResponsable']==NULL){
            $param['idResponsable']='null';
        }
        $outil = new ClasseOutils();
        $query = " UPDATE `salarie` "
                . "SET `nom`= '" . $param['nom'] . "' ,`prenom`= '" . $param['prenom'] . "' ,"
                . "`dateEntre`= DATE (STR_TO_DATE('" . $param['dateEntre'] . "', '%d/%m/%Y')) ,"
                . "`statutId`= " . $param['statutId'] ;
        
        
        $st =$this->getInfoAnimatrice($param['id']); 
       
        if($param['statutId']!=$st->statutId){
            $param['idResponsable']='null';
        }
        
        $query .= ", `idResponsable`= ".$param['idResponsable']." "
                . "WHERE `id` = :id";
        $connexion = $outil->connection();
        $prepare = $connexion->prepare($query);
     //   var_dump($query);
        $prepare->execute(array('id' => $param['id']));
    }
    
    
    public function createAnimatrice($param){
        $outil = new ClasseOutils();
        $query = " INSERT INTO `salarie`( `nom`, `prenom`, `dateEntre`, `statutId`, `actif`, `idResponsable`) "
                . "VALUES ( '".$param['nom']."' ,  '" . $param['prenom'] . "' ,"
                . " DATE (STR_TO_DATE('" .$param['dateEntre']."', '%d/%m/%Y')) ,"
                . $param['statutId'] . " , 1 , ". $param['idResponsable'] ." ); SELECT LAST_INSERT_ID( )";
       
        $connexion = $outil->connection();
        $prepare = $connexion->prepare($query);
        var_dump($query);
        $prepare->execute(array('id' => $param['id']));
        return $prepare->fetch(PDO::FETCH_ASSOC) ;
        }
        
        /*
         * SELECT LAST_INSERT_ID( )
         */
        
        
        
    

    
    
    
    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getDateEntre() {
        return $this->dateEntre;
    }

    public function getDateSortie() {
        return $this->dateSortie;
    }

    public function getStatut() {
        return $this->statut;
    }

    public function getResponsable() {
        return $this->responsable;
    }

    public function getListePrecompte() {
        return $this->listePrecompte;
    }

    public function getListeEquipe() {
        return $this->listeEquipe;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setDateEntre($dateEntre) {
        $this->dateEntre = $dateEntre;
    }

    public function setDateSortie($dateSortie) {
        $this->dateSortie = $dateSortie;
    }

    public function setStatut($statut) {
        $this->statut = $statut;
    }

    public function setResponsable($responsable) {
        $this->responsable = $responsable;
    }

    public function setListePrecompte($listePrecompte) {
        $this->listePrecompte = $listePrecompte;
    }

    public function setListeEquipe($listeEquipe) {
        $this->listeEquipe = $listeEquipe;
    }
    public function getResponsableId() {
        return $this->responsableId;
    }

    public function setResponsableId($responsableId) {
        $this->responsableId = $responsableId;
    }

        public function iniListEquipe() {
        $outil = new ClasseOutils();
        $connexion = $outil->connection();
        $prepare = $connexion->prepare("SELECT `id`, `nom`, `prenom` FROM `salarie` WHERE `idResponsable` = :id");
        $prepare->execute(array('id' => $this->id));

        while ($ligne = $prepare->fetch(PDO::FETCH_ASSOC)) {
            array_push($this->listeEquipe, $ligne);
        }
    }

}
