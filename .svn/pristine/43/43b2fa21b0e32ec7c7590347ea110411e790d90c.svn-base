<?php
require './iniPhp.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $outils = new ClasseOutils();
    $salarie = new ClasseAnimatrice($id);
//    json_encode($salarie->getInfoAnimatrice($id));
//    json_encode($outils->getInfoAllAnimatricesLite());
}
?>
<script src="./js/ui-bootstrap-tpls-0.10.0.min.js"></script>
<div class="row" id="prLigne" ng-app="formAnimApp" >

    <div class="col-md-8" >
        <h1>Edition mode</h1>

        <form>
            <div ng-controller="formAnimCrt">
            <div class="form-group">
                <label for="inputNom">Nom :</label>
                <input type="text" name="nom" class="form-control" id="inputNom" value="{{anim.nom}}" placeholder="nom">
            </div>
            <div class="form-group">
                <label for="inputNom">Prenom :</label>
                <input type="text" class="form-control" name="prenom" value="{{anim.prenom}}" placeholder="nom">
            </div>

            <div class="form-group">
                
                <label >statut :</label>
                 <select ng-model="myStatut" class="form-control" name="statutId" ng-options="statut.label for statut in listStatuAnim"></select>
            </div>
            <div class="form-group">
                
                <label >Responsable :</label>
                <span  class="nullable">
                 <select ng-model="myResponsable" class="form-control" name="idResponsable" ng-options="resp.nom for resp in ListeReponsable"></select>
                 </span>
            </div>
            </div>
            <div >
                
                
            
            </div>
            
        </form>
</div>
</div>
 <a class="btn btn btn-primary"   style="text-align: right" href="" onclick="document.location.reload(true)"  >Annuler</a>
    <a class="btn btn btn-success" style="text-align: right" href="">Sauver Infos</a>
     <a class="btn btn-default"  href="javascript:history.back();">retour</a>

     <div class="col-md-4" ng-app="DateApp">

         <div ng-controller="DatepickerCtrl">
             <h4>Popup</h4>
             <div class="row">
                 <div class="col-md-6">
                     <p class="input-group">
                         <input type="text" class="form-control" datepicker-popup="{{format}}" ng-model="dt" is-open="opened" min="minDate" max="'2015-06-22'" datepicker-options="dateOptions" date-disabled="disabled(date, mode)" ng-required="true" close-text="Close" />
                         <span class="input-group-btn">
                             <button class="btn btn-default" ng-click="open($event)">
                                 <i class="glyphicon glyphicon-calendar"></i></button>
                         </span>
                     </p>
                 </div>
             </div>
         </div>
     </div>
    
    
    

 <script>
var app = angular.module('formAnimApp', []);
    app.controller('formAnimCrt', function($scope) {
                 
        $scope.listStatuAnim = <?php echo $outils->getAllStatutAnimJson(); ?>;
        $scope.anim = <?php  echo json_encode($salarie->getInfoAnimatrice($id)); ?>;
    
        if($scope.anim.statutId!==null){

            for(var index in $scope.listStatuAnim) { 
                var attr = $scope.listStatuAnim[index]; 
                    if(attr.id===$scope.anim.statutId){
                        console.log("Attribut= "+attr.id +"  scopeId= "+$scope.anim.statutId);
                        $scope.myStatut = attr;
                    }
            }
        }
    
    
 $scope.ListeReponsable = <?php echo json_encode($outils->getInfoAllAnimatricesLite());?> ;
             
        if($scope.anim.idResponsable!==null){

           for(var index in $scope.ListeReponsable) { 
               var attr = $scope.ListeReponsable[index]; 

               if(attr.id===$scope.anim.idResponsable){
                   
                   console.log("Attribut= "+attr.id +"  scopeId= "+$scope.anim.idResponsable);
                   $scope.myResponsable = attr;
               }

           }
        }
    
});
   
  </script>
 
<script>
  
  var appDate = angular.module('DateApp', ['ui.bootstrap']);
        appDate.controller('DatepickerCtrl', function ($scope) {
            $scope.today = function() {
              $scope.dt = new Date();
            };
            
            $scope.today();

            $scope.showWeeks = true;
            $scope.toggleWeeks = function () {
              $scope.showWeeks = ! $scope.showWeeks;
            };

            $scope.clear = function () {
              $scope.dt = null;
            };

           // Disable weekend selection
            $scope.disabled = function(date, mode) {
              return ( mode === 'day' && ( date.getDay() === 0 || date.getDay() === 6 ) );
            };

            $scope.toggleMin = function() {
              $scope.minDate = ( $scope.minDate ) ? null : new Date();
            };
            $scope.toggleMin();

            $scope.open = function($event) {
              $event.preventDefault();
              $event.stopPropagation();

              $scope.opened = true;
            };

            $scope.dateOptions = {
              'year-format': "'yy'",
              'starting-day': 1
            };

            $scope.formats = ['dd-MMMM-yyyy', 'yyyy/MM/dd', 'shortDate'];
            $scope.format = $scope.formats[0];
          });
</script>
  
  
