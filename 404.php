<?php
require './iniPhp.php';
$outils = new ClasseOutils();
//$liste = $outils->getInfoAllAnimatrices();
$liste = $outils->getInfoAllAnimatrices();
//echo $outils->getInfoAllAnimatricesJson();
?>
<!DOCTYPE html>
<html >
    <head>
        <?php require_once  './fileInclude/heade.php'; ?>
        
        <title>Accueil</title>
    </head>
    <body ng-app>

            <?php include './fileInclude/barNavigation.php';?>
        <div class="container" >
            
            <div class="row">
                    <h1>Accueil</h1>
                    
            </div>
            <div class="col-md-12">
                
            </div>
            
        </div>
        
    
    </body>
</html>

