<?php
require './iniPhp.php';
$paramGene = new ClasseParamInit();
//var_dump($paramGene->getJson());

if($_POST['maj']=='ok'){
    // var_dump($_POST);
    $paramGene->updateInfo($_POST);
    
    $paramGene = new ClasseParamInit();    
}


?>
<!DOCTYPE html>
<html >
    <head>
        <?php require_once  './fileInclude/heade.php'; ?>
        
        <title>Accueil</title>
    </head>
    
    <body ng-app="appParamGene">
        <?php include './fileInclude/barNavigation.php';?>
        <div class="container " ng-controller="ParamGeneCrt">
            <div class=" panel panel-default">
                <div class="panel-heading">
                    <h1>Parametres G&eacute;n&eacute;raux</h1>
                </div>
                <div class="panel-body">
                    <form id="formParam" action="parametresGeneraux.php" method="POST">
                    <div class="row">
                        <div class="panel col-md-12">
                            <div class="btn-group btn-group-justified">
                                <div class="btn-group">
                                    <button class="btn btn-default" >reinitialiser</button>
                                </div>
                                <div class="btn-group">
                                    <button class="btn btn-default" type="submit" name="maj" value="ok" >
                                     valider
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" panel col-md-12">
                            
                                <div style="margin-bottom: 2px" ng-repeat="(nom , param) in ParamGene"  class="input-group">
                                    <label class="input-group-addon" style="width: 200px">{{nom}}</label>
                                    <input type="text" class="form-control" name="{{nom}}" value="{{param}}" required/>
                                </div>
                        </div>
                    </div>
                        </form>
                </div>
            </div>
        </div>
        
        
        
    <script>
        var app = angular.module('appParamGene', []);

       app.controller('ParamGeneCrt', function($scope) {
           $scope.ParamGene = <?= $paramGene->getJson();?>;
          console.log($scope.ParamGene);
             
             $scope.var1= 20;
             $scope.resultat;
            
             
             $scope.change = function(){
                 $scope.resultat = $scope.var1*2;
             };
             
             console.log($scope.resultat);
        });
      
    </script>
    </body>
</html>