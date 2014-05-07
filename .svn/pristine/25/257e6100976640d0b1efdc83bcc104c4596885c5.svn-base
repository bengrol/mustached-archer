<?php
require './iniPhp.php';
$listePrecompte = new ClasseOutils();
 // var_dump($listePrecompte->getAllPrecompteExportJson(1));
?>

<html >
    <head>
        <?php require_once './fileInclude/heade.php'; ?>

        <title>Listing Export</title>
    </head>
    <body ng-app="appListing">
        <?php include './fileInclude/barNavigation.php'; ?>
        
        <div class="container" ng-controller="listingCrt">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Liste des Bordereaux</h1>
                </div>
                <div class="panel-body">
                    <div class="panel  col-md-6">
                        <input class="form-control" type="text" ng-model="filtre" placeholder="rechercher"/>
                    </div>
                    <div class="panel  col-md-6">
                        <div class="btn-group btn-group-justified">
                            <a class="btn btn-default" href="">envoyer en compta</a>
                            <a class="btn btn-default" href="javascript:history.back();">retour</a>
                            <a class="btn btn-default" href="" >ne Pas CLiquer</a>
                        
                        </div>
                    </div>
                    <div class="col-md-6 alert-info">
                        <h2>pret pour l'export</h2>
                        <div class="list-group">
                            <a ng-repeat="li in listingOk | filter :filtre" class="list-group-item" href="precompteAnimatrice.php?id={{li.idSalarie}}&edit={{li.idPrecompte}}">
                                <h4 class="list-group-item-heading">{{li.nom}}</h4>
                                <p class="list-group-item-text">br n° : {{li.idPrecompte}} / du : {{li.datePrecompte}}</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6  alert-warning">
                        <h2>incomplet</h2>
                        <div class="list-group">
                            <a ng-repeat="li in listingIncomplet | filter :filtre" class="list-group-item"
                               href="precompteAnimatrice.php?id={{li.idSalarie}}&edit={{li.idPrecompte}}">
                                <h4 class="list-group-item-heading">{{li.nom}}</h4>
                                <p class="list-group-item-text">br n° : {{li.idPrecompte}} / du : {{li.datePrecompte}}</p>
                            </a>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
        
        
        <script>
            var app = angular.module('appListing', ['ui.bootstrap']);

            app.controller('listingCrt', function($scope) {
                $scope.listingOk = <?php echo $listePrecompte->getAllPrecompteExportJson(2); ?>;
                $scope.listingIncomplet = <?php echo $listePrecompte->getAllPrecompteExportJson(1); ?>;

                console.log($scope.listing);
            });
        </script>

    </body>
</html> 
