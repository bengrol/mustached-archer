<div ng-if="totalComCaHT>=objs.seuilComFO">
    <table class="table"> 
        <tbody>
            <tr>
                <td colspan="2" style="text-align: center">COMMISSION SUR FRAIS</td>
            </tr>
            <tr>
                <td>Nbe de FO payées / {{totalFO}}</td>
                <td>
                    <input type="hidden" 
                           name="commisionFrais" 
                           value="{{totalFO * objs.txComFraisFO | number:2 }}"/>
                    {{totalFO * objs.txComFraisFO | number:2 }}
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div ng-if="totalComCaHT<objs.seuilComFO">
    <input type="hidden" name="commisionFrais" value="0"/>
</div>