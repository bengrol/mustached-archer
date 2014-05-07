<?php
//$precompte =new ClassePrecompte($id);
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
</script>


<input type="hidden" name="TxComDR"  value="{{objs.TxComDR}}"/>
<input type="hidden" name="TxComAR"    value="{{objs.TxComAR}}"/> 
<input type="hidden" name="txTVA"       value="{{objs.txTVA}}"/>
<input type="hidden" name="txComFraisFO" value="{{objs.txComFraisFO}}"/>
<input type="hidden" name="maxFObinome" value="{{objs.maxFObinome}}"/>
<input type="hidden" name="editable"    value="1"/>



<h4 id="toglleParam">parametrages</h4>
<div id="toglleTable">
    <div class="col-md-6">


        <table class="table"> 
            <tbody>
                <tr>
                    <td>com FO tx plein</td>
                    <td><input type="text" 
                               value="{{objs.comArgusTxPlein}}"
                               ng-model="objs.comArgusTxPlein"  
                               name="comArgusTxPlein" size="3"ng-change="change()" /></td>
                </tr>

                <tr>
                    <td>fixe manager </td>
                    <td><input type="text"
                               value="{{objs.fixeManager}}"
                               ng-model="objs.fixeManager" 
                               name="fixeManager" size="3"ng-change="change()"  /> </td>  
                </tr>
                <tr>
                    <td>commission sur MBP</td>
                    <td><input type="text" 
                               value="{{objs.comMBP}}"
                               ng-model="objs.comMBP" 
                               name="comMBP" size="3" ng-change="change()" /></td>
                </tr>

                

            </tbody>
        </table>
    </div>
    <div class="col-md-6">
        <table class="table"> 
            <tbody>

                <tr>
                    <td>com FO tx reduit</td>
                    <td><input type="text" 
                               value="{{objs.comArgusTxPlein}}" 
                               ng-model="objs.comArgusTxReduit" 
                               name="comArgusTxReduit" size="3" ng-change="change()" /></td>
                </tr>
                <tr>
                    <td>tx com sur C.A H.T</td>
                    <td><input type="text"
                               value="{{objs.TxComCAHT}}" 
                               ng-model="objs.TxComCAHT"  
                               name="TxComCAHT" size="3" ng-change="change()" /></td>
                </tr>
                <tr>
                    <td>Seuil de com FO</td>
                    <td>
                        <input type="text" name="seuilComFO" 
                               ng-model="objs.seuilComFO"
                               value="{{objs.seuilComFO}}" size="3" ng-change="change()" />
                    </td>
                   
                </tr>
            </tbody>
        </table>
    </div>
</div>
<script>
    
$(document).ready(function(){
    
    $("#toglleTable").toggle();
    
    
  $("#toglleParam").click(function(){
    $("#toglleTable").toggle("fold");
  });
});

</script>
