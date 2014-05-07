<?php
// NOUVEAU

?>

<table class="table">
    <tbody >
        <tr>
            <td colspan="2" style="text-align: center">COMMISSION SUR CARTE</td>
        </tr>
        <tr>
            <td>Nbe de MBP</td>
            <td>Montant</td>
        </tr>
        <tr>
            <td>
                <input type="text"  name="nbMBP" value="{{objs.nbMBP}}" 
                       ng-model="objs.nbMBP" size="3" ng-change="change()"  />
            </td>
            <td><a title="50% du prix de vente H.T des MBP">{{objs.nbMBP*objs.comMBP | number:2}}</a></td>
        </tr>

    </tbody>
</table>