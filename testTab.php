<?php
require './iniPhp.php';

?>
<!DOCTYPE html>
<html ng-app="monApp">  
    <head lang="en">
        <meta charset="utf-8">
        <title>Getting Started With ngGrid Example</title>  
       <?php include './fileInclude/heade.php'; ?>
      
    </head>
    <body ng-controller="ObjCrt">
       
        <div ng-repeat="ob in objs">
            <input type="text" ng-model="annulationHT" />
            
CA : {{ob.test}}
TVA : {{  ob.txTVA2 }}
TOTAL FO : {{ob.totalFO }}
CA MBP : {{ob.CAMBPHT }}
CA MBP TTC: {{ob.CAMBPTTC}}
CA TTC : {{ob.CATTC }}
           
        </div>
        
        
        
        <script>
                var app =angular.module('monApp',[]);
                
               app.controller('ObjCrt',function ($scope){
                   
               
               
                $scope.objs = [
                    {"idPrecompte":"1","idSalarie":"23","idStatutPrecompteIndex":"1","datePrecompte":"2014-04-24","nbJourDeclare":"1","nbFOannonce":"1","nbFOrecu":"20","nbFOretour":"1","nbArguBinome":"0","nbArguPerso":null,"CA_HT":"400","annulationHT":null,"nbVente":"30","nbMBP":"6","rembourseFrais":"10","PrimePalier":null,"PrimeAnimation":null,"autrePrime":null,"ObservPrimePalier":"null","ObservRembFrais":"null","ObservAutrePrime":"blalal","deleted":"0","editable":"1","comMBP":"24.58","TxComCAHT":"0.1","comArgusTxPlein":"20","comArgusTxReduit":"10","TxComDR":"0.015","TxComAR":"0.04","txComFraisFO":"3.34","seuilComFO":"2200","maxFObinome":"20","fixeManager":"1200","txTVA":"0.2","comFraisFO":null,"dateFormat":"24/04/2014"} ,
                    {"idPrecompte":"2","idSalarie":"18","idStatutPrecompteIndex":"2","datePrecompte":"2014-04-24","nbJourDeclare":"21","nbFOannonce":"21","nbFOrecu":"40","nbFOretour":"1","nbArguBinome":"0","nbArguPerso":null,"CA_HT":"1600","annulationHT":null,"nbVente":"30","nbMBP":"6","rembourseFrais":"10","PrimePalier":null,"PrimeAnimation":null,"autrePrime":null,"ObservPrimePalier":"null","ObservRembFrais":"null","ObservAutrePrime":"blalal","deleted":"0","editable":"1","comMBP":"24.58","TxComCAHT":"0.1","comArgusTxPlein":"20","comArgusTxReduit":"10","TxComDR":"0.015","TxComAR":"0.04","txComFraisFO":"3.34","seuilComFO":"2200","maxFObinome":"20","fixeManager":"1200","txTVA":"0.2","comFraisFO":null,"dateFormat":"24/04/2014"} ,
                ] ;
                
                
     var ob =   $scope.objs ;
     
     for(var index in ob) { 
        var attr = ob[index]; 
        
        attr.txTVA2 = attr.txTVA +1;
        attr.totalFO = attr.nbFOrecu - attr.nbFOretour;
        attr.CAMBPHT = attr.nbMBP * attr.comMBP *2;
        attr.CAMBPTTC = attr.CAMBPHT * attr.txTVA2;
        attr.CATTC = attr.CA_HT * attr.txTVA2 ;
        
        attr.annulationTTC = attr.annulationHT * attr.txTVA2;
        attr.totalComCaTTC = attr.CATTC  - attr.annulationTTC - attr.CAMBPTTC;
        attr.totalComCaHT = attr.CA_HT  - attr.annulationHT - attr.CAMBPHT;

        attr.efficacite = (attr.nbVente*100)/((attr.nbFOrecu * 1)-(1 * attr.nbFOretour));
        attr.panierMoyen = attr.CATTC /attr.nbVente ;
        attr.comFOTxPlein = attr.comArgusTxPlein * attr.totalFO;
        attr.comFOTxReduit = attr.comArgusTxReduit * attr.nbArguBinome;
        attr.totalComFO = attr.comFOTxPlein + attr.comFOTxReduit;
        attr.totalComMBP = attr.nbMBP * attr.comMBP ;
        attr.totalComCA = attr.totalComCaHT * attr.TxComCAHT;
        attr.totalGratification = (attr.rembourseFrais*1) +(attr.PrimePalier*1) + (attr.PrimeAnimation*1) + (attr.autrePrime*1);
        attr.totalGeneral = (attr.totalComFO*1) + (attr.totalComMBP*1) + (attr.totalComCA*1) + (attr.totalGratification*1);                 
 
    }
                
                
                






$scope.txTVA2 = $scope.objs.txTVA +1;

$scope.totalFO = $scope.objs.nbFOrecu - $scope.objs.nbFOretour;
$scope.CAMBPHT = $scope.objs.nbMBP * $scope.objs.comMBP *2;
$scope.CAMBPTTC = $scope.CAMBPHT * $scope.txTVA2;
$scope.CATTC = $scope.objs.CA_HT * $scope.txTVA2 ;
$scope.annulationTTC = $scope.objs.annulationHT * $scope.txTVA2;
$scope.totalComCaTTC = $scope.CATTC  - $scope.annulationTTC - $scope.CAMBPTTC;
$scope.totalComCaHT = $scope.objs.CA_HT  - $scope.objs.annulationHT - $scope.CAMBPHT;

$scope.efficacite = ($scope.objs.nbVente*100)/(($scope.objs.nbFOrecu * 1)-(1 * $scope.objs.nbFOretour));
$scope.panierMoyen = $scope.CATTC /$scope.objs.nbVente ;
$scope.comFOTxPlein = $scope.objs.comArgusTxPlein * $scope.totalFO;
$scope.comFOTxReduit = $scope.objs.comArgusTxReduit * $scope.objs.nbArguBinome;
$scope.totalComFO = $scope.comFOTxPlein + $scope.comFOTxReduit;
$scope.totalComMBP = $scope.objs.nbMBP * $scope.objs.comMBP ;
$scope.totalComCA = $scope.totalComCaHT * $scope.objs.TxComCAHT;
$scope.totalGratification = ($scope.objs.rembourseFrais*1) +($scope.objs.PrimePalier*1) + ($scope.objs.PrimeAnimation*1) + ($scope.objs.autrePrime*1);
$scope.totalGeneral = ($scope.totalComFO*1) + ($scope.totalComMBP*1) + ($scope.totalComCA*1) + ($scope.totalGratification*1);                 
                 
                 
                 $scope.change = function(){
                    $scope.totalFO = $scope.objs.nbFOrecu - $scope.objs.nbFOretour;
                    $scope.CAMBPHT = $scope.objs.nbMBP * $scope.objs.comMBP *2;
                    $scope.CAMBPTTC = $scope.CAMBPHT * $scope.txTVA2;
                    $scope.CATTC = $scope.objs.CA_HT * $scope.txTVA2 ;
                    $scope.annulationTTC = $scope.objs.annulationHT * $scope.txTVA2;
                    $scope.totalComCaTTC = $scope.CATTC  - $scope.annulationTTC - $scope.CAMBPTTC;
                    $scope.totalComCaHT = $scope.objs.CA_HT  - $scope.objs.annulationHT - $scope.CAMBPHT;
                    $scope.efficacite = ($scope.objs.nbVente*100)/(($scope.objs.nbFOrecu * 1)-(1 * $scope.objs.nbFOretour));
                    $scope.panierMoyen = $scope.CATTC /$scope.objs.nbVente ;
                    $scope.comFOTxPlein = $scope.objs.comArgusTxPlein * $scope.totalFO;
                    $scope.comFOTxReduit = $scope.objs.comArgusTxReduit * $scope.objs.nbArguBinome;
                    $scope.totalComFO = $scope.comFOTxPlein + $scope.comFOTxReduit;
                    $scope.totalComMBP = $scope.objs.nbMBP * $scope.objs.comMBP ;
                    $scope.totalComCA = $scope.totalComCaHT * $scope.objs.TxComCAHT;
                   
                    $scope.totalGratification = ($scope.objs.rembourseFrais*1) +($scope.objs.PrimePalier*1) + ($scope.objs.PrimeAnimation*1) + ($scope.objs.autrePrime*1);
                     $scope.totalGeneral = ($scope.totalComFO*1) + ($scope.totalComMBP*1) + ($scope.totalComCA*1) + ($scope.totalGratification*1);


             };
             
                 
                 
                 
              // console.log($scope.objs);
               });
        </script>
    </body>
</html>
 
