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
        <style>
          
            
        </style>
        <title>Accueil</title>
    </head>
    <body ng-app="appListAnim">
        <?php include './fileInclude/barNavigation.php'; ?>
        <div class="container" ng-controller="listAnimCrt" >
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Liste des animatrices</h1>
                </div>
                <div class="panel-body">
                    <div class="panel  col-md-6">
                        <input class="form-control" type="text" ng-model="filtre" placeholder="rechercher"/>
                    </div>
                    <div class="panel  col-md-6">
                        <div class="btn-group btn-group-justified">
                            <a class="btn btn-default" href="editeAnimatrice.php?action=new">Nouvelle Animatrice</a>
                            <a class="btn btn-default" href="javascript:history.back();">retour</a>
                            <a class="btn btn-default" href="" >ne Pas CLiquer</a>
                        
                        </div>
                    </div>
                    <div class="list-group " style="display : inline-block ; width: 100%; "  >
                        <div ng-repeat="anim in listAnim | filter : filtre" 
                             style="display : inline-block ; width: 25%  " class="list-group-item" >
                            <div style="display: inline-block; width: 170px">
                                <a class="" style="text-overflow: ellipsis"
                                   href="detailAnimatrice.php?id={{anim.id}}">
                                    {{anim.nom | uppercase | limitTo:10}} {{anim.prenom | limitTo:5}}
                                </a>
                            </div>    
                            <div style="text-align: right; display: inline">
                                <a class="btn btn-primary" href="precompteAnimatrice.php?id={{anim.id}}&new">New</a>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>

        <script>
           var app = angular.module('appListAnim', ['ui.bootstrap']);

           app.controller('listAnimCrt', function($scope) {
               $scope.listAnim = <?php echo $outils->getInfoAllAnimatricesJson(); ?>;
   
           

               console.log($scope.listAnim);
           });
        </script>
    </body>
</html>

