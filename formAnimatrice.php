<?php
require './iniPhp.php';
//echo $outils->getAllStatutAnimJson();
//echo json_encode($salarie->getInfoAnimatrice($id));
//var_dump($outils->getInfoAllAnimatricesLite());

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $outils = new ClasseOutils();
    $salarie = new ClasseAnimatrice($id);
//    json_encode($salarie->getInfoAnimatrice($id));
//    json_encode($outils->getInfoAllAnimatricesLite());
}
?>
<script src="./js/ui-bootstrap-tpls-0.10.0.min.js"></script>


<form id="formNew" action="detailAnimatrice.php" method="POST" ng-app="formAnimApp">
    <div id="prLigne" class="panel panel-default" ng-controller="formAnimCrt">
        <div class="panel-heading ">
            <h1>Edition de la fiche {{anim.nom}} {{anim.prenom}} </h1>
        </div>
        <div class="panel-body">
            <div class="panel  col-md-12">
                <div class="btn-group btn-group-justified">
                    <a class="btn btn-default" href="detailAnimatrice.php?id={{anim.id}}" >Annuler </a>
                    <a class="btn btn-default" href="javascript:history.back();">retour</a>
                    <div class="btn-group">
                        <button  form="formNew" class="btn btn-default"  value="Sauvegarder Infos" name="onCreate">
                            Mettre à jour Infos
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <input type="hidden" name="updateAnim" value="{{anim.id}}">
                    <div class="form-group">
                        <label for="inputNom">Nom :</label>
                        <input type="text" name="nom"
                               class="form-control" id="inputNom" 
                               value="{{anim.nom}}" placeholder="nom">
                    </div>
                    <div class="form-group">
                        <label for="inputNom">Prenom :</label>
                        <input type="text" class="form-control" 
                               name="prenom" value="{{anim.prenom}}" placeholder="nom">
                    </div>
                <div>
                    <span ng-repeat="st in listStatuAnim" >
                        <label for="radio{{st.id}}">{{st.label }}</label>
                        <input class="statutIdRadio" type="radio" id="radio{{st.id}}" name="statutId" 
                               value="{{st.id}}" ng-checked="checkItem(st.id)" />
                    </span>
                </div>
                <div class="form-group">
                    <label>Responsable :</label>
                    <select class="form-control" name="idResponsable"  >
                        <option value='null'>pas de responsable</option>
                        <?php 
                            $tab = $outils->getInfoAllAnimatricesLite();
                                for($i=0;$i<count($tab)-1;$i++ ) {
                                    echo '<option value="'.$tab[$i]->id.'"';
                                    if($tab[$i]->id == $salarie->getResponsableId()){
                                        echo 'selected >'.$tab[$i]->nom.' </option>';
                                    }else{
                                        echo '>'.$tab[$i]->nom.' </option>';
                                    }

                                }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6 ">
                <div ng-controller="DatepickerCtrl">
                    <div class="row">
                     <div class="col-md-6">
                         <h4>Date d'entr&eacute;e</h4>
                         <p class="input-group">
                             <input type="text" name="dateEntre" 
                                    class="form-control" 
                                    datepicker-popup="{{format}}" 
                                    ng-model="dateEntre" 
                                    is-open="opened"  
                                    datepicker-options="dateOptions" 
                                    date-disabled="disabled(date, mode)" 
                                    ng-required="true" close-text="Close" />
                             <span class="input-group-btn">
                                 <button class="btn btn-default" ng-click="open($event)">
                                     <i class="glyphicon glyphicon-calendar"></i></button>
                             </span>
                         </p>
                     </div>
                 </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    
var app = angular.module('formAnimApp', ['ui.bootstrap']);
    app.controller('formAnimCrt', function($scope) {
                 
        $scope.listStatuAnim = <?php echo $outils->getAllStatutAnimJson(); ?>;
        $scope.anim = <?php  echo json_encode($salarie->getInfoAnimatrice($id)); ?>;
    
    
        $scope.ListeReponsable = <?php echo json_encode($outils->getInfoAllAnimatricesLite());?> ;
             
        $scope.checkItem = function (id) {
            var checked = false;
            if(id === $scope.anim.statutId){
               checked = true;
           }
           return checked;    
       };
    
});
   
  
app.controller('DatepickerCtrl', function ($scope) {
            $scope.today = function() {
              $scope.dateEntre = $scope.anim.dateEntre;
              //$scope.dt = new Date();
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

            $scope.formats = ['dd-MMMM-yyyy', 'yyyy/MM/dd', 'dd/MM/yy','shortDate'];
            $scope.format = $scope.formats[2];
            
          });
</script>
  
  
