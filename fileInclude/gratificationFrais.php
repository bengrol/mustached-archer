
<h4>AUTRES GRATIFICATIONS OU FRAIS {{totalGratification}} &euro;</h4>
 
<div ng-controller="AccordionDemoCtrl">
  

  <accordion close-others="oneAtATime">
      
    
    <accordion-group  >
        <accordion-heading>
            <label style=" width: 330px">Remboursement frais {{objs.rembourseFrais}}&euro;</label>
            <i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': isopen, 'glyphicon-chevron-right': !isopen}"></i>
        </accordion-heading>
        <div>
            <label style=" vertical-align: top; ; width: 150px">commentaires</label>
            <div >{{objs.ObservPrimePalier}}</div>
        </div>
        
    </accordion-group>
    
    
    <accordion-group  >
        <accordion-heading>
             <label style=" width: 330px">Primes palier {{objs.PrimePalier}} &euro;</label>
            <i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': isopen, 'glyphicon-chevron-right': !isopen}"></i>
        </accordion-heading>
        
        <div>
            <label style=" vertical-align: top; ; width: 150px">commentaires</label>
            <div>{{objs.ObservRembFrais}}</div>
        </div>
        
    </accordion-group>
    
    
    <accordion-group >
        <accordion-heading>
            <label style=" width: 330px">Prime d'animation {{objs.PrimeAnimation}} &euro;</label>
            <i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': isopen, 'glyphicon-chevron-right': !isopen}"></i>
        </accordion-heading>
        
    </accordion-group>
    
    
    <accordion-group >
        <accordion-heading>
            <label style=" width: 330px">Autre Prime / avance {{objs.autrePrime}} &euro;</label>
            <i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': isopen, 'glyphicon-chevron-right': !isopen}"></i>
        </accordion-heading>

        <div>
            <label style=" vertical-align: top; ; width: 150px">commentaires</label>
            <div >{{objs.ObservAutrePrime}}</div>
        </div>
        
    </accordion-group>
    
    
    
  </accordion>
</div>



<script>

    function AccordionDemoCtrl($scope) {
  $scope.oneAtATime = true;

  
}

</script>