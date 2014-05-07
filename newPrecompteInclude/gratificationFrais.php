<?php
// NOUVEAU
?>
<h4>AUTRES GRATIFICATIONS OU FRAIS {{totalGratification}} &euro;</h4>
 
<div ng-controller="AccordionDemoCtrl">
  

  <accordion close-others="oneAtATime">
      
    
    <accordion-group  >
        <accordion-heading>
            <label style=" width: 330px">Remboursement frais</label>
            <input type="text" name="rembourseFrais" size="3" ng-model="objs.rembourseFrais" ng-change="change()" />&euro;
            <i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': isopen, 'glyphicon-chevron-right': !isopen}"></i>
        </accordion-heading>
        <div>
            <label style=" vertical-align: top; ; width: 150px">commentaires</label>
            <textarea name="ObservPrimePalier" placeholder="Observations / commentaires" >{{objs.ObservPrimePalier}}</textarea>
        </div>
        
    </accordion-group>
    
    
    <accordion-group  >
        <accordion-heading>
             <label style=" width: 330px">Primes palier</label>
            <input type="text" name="PrimePalier" size="3" ng-model="objs.PrimePalier" ng-change="change()"/>&euro;
            <i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': isopen, 'glyphicon-chevron-right': !isopen}"></i>
        </accordion-heading>
        
        <div>
            <label style=" vertical-align: top; ; width: 150px">commentaires</label>
            <textarea name="ObservRembFrais" placeholder="Observations / commentaires" >{{objs.ObservRembFrais}}</textarea>
        </div>
        
    </accordion-group>
    
    
    <accordion-group >
        <accordion-heading>
            <label style=" width: 330px">Prime d'animation sur CAHT groupe 4%</label>
            <input type="text" name="PrimeAnimation" size="3"  ng-model="objs.PrimeAnimation" ng-change="change()"/>&euro;
            <i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': isopen, 'glyphicon-chevron-right': !isopen}"></i>
        </accordion-heading>
        
    </accordion-group>
    
    
    <accordion-group >
        <accordion-heading>
            <label style=" width: 330px">Autre Prime / avance salaire </label>
            <input type="text" name="autrePrime" size="3" ng-model="objs.autrePrime" ng-change="change()"/>&euro; <br/>
            <i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': isopen, 'glyphicon-chevron-right': !isopen}"></i>
        </accordion-heading>

        <div>
            <label style=" vertical-align: top; ; width: 150px">commentaires</label>
            <textarea name="ObservAutrePrime" placeholder="Observations / commentaires">{{objs.ObservAutrePrime}}</textarea>
        </div>
        
    </accordion-group>
    
    
    
  </accordion>
</div>



<script>

    function AccordionDemoCtrl($scope) {
  $scope.oneAtATime = true;

  
}

</script>