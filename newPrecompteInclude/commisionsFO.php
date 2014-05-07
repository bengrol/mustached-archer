<?php
// NOUVEAU

?>

 <table class="table">
    <tbody>
        <tr >
            <td colspan="3" style="text-align: center">COMMISSION SUR FO</td>
            <td><a  title="total des commissions sur les FO">
                    
                </a></td>
        </tr>
        <tr>
            <td>taux</td>
            <td>plein {{objs.comArgusTxPlein}}&euro;</td>
            <td>reduit / binome {{objs.comArgusTxReduit}}&euro;</td>
            <td></td>
        </tr>
        <tr>
            <td>Nbe FO payées</td>
            <td>{{totalFO}}</td>
            <td><input type="text" 
                       ng-model="objs.nbArguBinome" 
                       name="nbArguBinome"  ng-change="change()"
                       size="3" /></td>
            <td>TOTAL</td>
        </tr>
        <tr>
            <td>total</td>
           <td>{{comFOTxPlein}}</td>
           
           <td>{{comFOTxReduit}}</td>
           
           <td>{{ totalComFO }}</td>

        </tr>


    </tbody>
</table>