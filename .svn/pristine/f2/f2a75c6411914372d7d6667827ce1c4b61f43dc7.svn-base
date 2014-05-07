<?php
require './iniPhp.php';
$mois = new ClasseOutils();
$outils = new ClasseOutils();
$liste = $outils->getInfoAllAnimatrices();

if($_POST!=null){
    
    $liste= array(
        'id'=>intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)),
        'nbJourDeclare'=> filter_input(INPUT_POST, 'nbJourDeclare', FILTER_SANITIZE_NUMBER_INT),
        'nbFOannonce'=> filter_input(INPUT_POST, 'nbFOannonce', FILTER_SANITIZE_NUMBER_INT),
        'nbFOrecu'=> filter_input(INPUT_POST, 'nbFOrecu', FILTER_SANITIZE_NUMBER_INT),
        'nbFOretour'=> filter_input(INPUT_POST, 'nbFOretour', FILTER_SANITIZE_NUMBER_INT),
        'CA_HT'=> floatval($_POST['CA_HT']),
        'nbVente'=> filter_input(INPUT_POST, 'nbVente', FILTER_SANITIZE_NUMBER_INT),
        'commisionFrais'=> filter_input(INPUT_POST, 'commisionFrais', FILTER_SANITIZE_NUMBER_FLOAT),
        'nbArguPerso'=> filter_input(INPUT_POST, 'nbArguPerso', FILTER_SANITIZE_NUMBER_INT),
        'nbArguBinome'=> filter_input(INPUT_POST, 'nbArguBinome', FILTER_SANITIZE_NUMBER_INT),
        'nbMBP'=> filter_input(INPUT_POST, 'nbMBP', FILTER_SANITIZE_NUMBER_INT),
        
        'rembourseFrais'=> floatval($_POST['rembourseFrais']),
        'PrimePalier'=> floatval($_POST['PrimePalier']),
        'PrimeAnimation'=> floatval($_POST[ 'PrimeAnimation']),
        'annulationHT'=> floatval($_POST[ 'annulationHT']),
        'autrePrime'=> floatval($_POST[ 'autrePrime']),
        'editable'=> filter_input(INPUT_POST, 'editable', FILTER_SANITIZE_NUMBER_INT),
        'comMBP'=> floatval($_POST['comMBP']),
        'TxComCAHT'=> floatval($_POST['TxComCAHT']),
        'comArgusTxPlein'=> floatval($_POST['comArgusTxPlein']),
        'comArgusTxReduit'=> floatval($_POST['comArgusTxReduit']), 
        'TxComDR'=> floatval($_POST['TxComDR']),
        'TxComAR'=> floatval($_POST['TxComAR']), 
        'seuilComFO'=> floatval($_POST['seuilComFO']),
        'maxFObinome'=> filter_input(INPUT_POST,  'maxFObinome', FILTER_SANITIZE_NUMBER_INT),
        'fixeManager'=> floatval($_POST[ 'fixeManager']),
        'txTVA'=> floatval($_POST[ 'txTVA']), 
        'comFraisFO'=> floatval($_POST['comFraisFO']),
        'idStatutPrecompteIndex'=> filter_input(INPUT_POST, 'idStatutPrecompteIndex', FILTER_SANITIZE_NUMBER_INT),
        'txComFraisFO'=> floatval($_POST['txComFraisFO']),
        'ObservPrimePalier'=> strval($_POST['ObservPrimePalier']),
        'ObservRembFrais'=> filter_input(INPUT_POST,'ObservRembFrais', FILTER_SANITIZE_STRING),
        'ObservAutrePrime'=> filter_input(INPUT_POST,'ObservAutrePrime', FILTER_SANITIZE_STRING)
         
        
        );
       // echo'etape 1';
     //   var_dump($liste);
        
        if ($_POST['action'] =='update') {
            // echo 'UPDATE ';
        try {
            $precompte = new ClassePrecompte(array(
                'id'=>$liste['id']
            ));
            
            $precompte->updatePrecompte($liste, filter_input(INPUT_POST, 'idPrecompte', FILTER_SANITIZE_NUMBER_INT));
            // echo 'UPDATE OK';
            
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    } else {
        $newPrecompte = new ClassePrecompte(0);
        $newPrecompte->createPrecompte($liste);
    }
}

if (isset($_GET['action'])) {
    
     $intValId = intval(filter_input(INPUT_GET, 'idPrecompte', FILTER_SANITIZE_NUMBER_INT));
    if ($_GET['action'] == 'supp') {
        try {
           $mois->supprimePrecompte($intValId);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $salarie = new ClasseAnimatrice($id);
    
            
}
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'supp') {
    
}
    if ($_GET['action'] == 'new') {
    $pathContainer = './formNewAnimatrice.php';
}
    if ($_GET['action'] == 'edit') {
        $pathContainer = './formAnimatrice.php';
    
}
    
}
//echo 'get';
//var_dump($_GET);
//echo 'post';
// var_dump($_POST);

?>
<!DOCTYPE html>
<html >
    <head>
        <title>Detail compte  </title>
        <?php include './fileInclude/heade.php'; ?>
        <script src="./angular/js/bootstrap.js"></script> 
        <script src="./js/ui-bootstrap-custom-0.10.0.js"></script> 
    </head>
    <body>
        <?php include './fileInclude/barNavigation.php'; ?>
        <div class="container" > 
            <?php include $pathContainer; ?>
        </div>
    </body>
</html>

