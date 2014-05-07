<?php
// NOUVEAU
?>
<table class="table">

    <tbody>
        <tr>
            <td colspan="4" style="text-align: center">COMMISSION SUR CA</td>
            <td >
                <a  title="{{(objs.TxComCAHT*100)}} % calcul&eacute; sur le C.A H.T ">
                    {{ totalComCA |number:2}}&euro;
                </a>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>CA</td>
            <td>Annul.</td>
            <td>CA MBP</td>
            <td>TOTAL</td>
        </tr>
        <tr>
            <td>TTC</td>
            <td>{{CATTC | number :2 }} &euro;</td>
            <td>{{annulationTTC | number:2}} &euro;</td>
            <td>{{CAMBPTTC| number:2}} &euro;</td>
            <td>{{totalComCaTTC | number:2}} &euro;</td>

        </tr>
        <tr>
            <td>HT</td>
            <td><input type="text" 
                       ng-model="objs.CA_HT" 
                       name="CA_HT" size="6" ng-change="change()"required /> &euro;</td>
            
            <td><input type="text" ng-model="objs.annulationHT" 
                       name="annulationHT" 
                       size="3" ng-change="change()"  /> &euro;</td>
            
            <td>{{CAMBPHT | number:2}} &euro;</td>
            <td>{{totalComCaHT |number:2}} &euro;</td>
        </tr>
        <tr>
            <td>nb Vente</td>
            <td><input type="text" 
                       ng-model="objs.nbVente" 
                       name="nbVente"  
                       ng-change="change()" required/></td>
            <td></td>
            <td></td>
            <td></td>

        </tr>
        <tr>
            <td>efficacit&eacute; </td>
            <td>{{efficacite | number:2}}%</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Panier moyen</td>
            <td>{{panierMoyen | number :2 }} &euro;</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

    </tbody>
</table>