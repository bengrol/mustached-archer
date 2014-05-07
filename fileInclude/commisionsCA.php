<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script>
  $(function() {
    $( document ).tooltip();
  });
  </script>
  
  <table class="table">

      <tbody>
        <tr>
            <td colspan="4" style="text-align: center">COMMISSION SUR CA</td>
            <td >
                <a  title="{{objs.TxComCAHT *100 }} % calcul&eacute; sur le C.A H.T " ><strong>{{ totalComCA |number:2}} &euro;</strong></a>
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
            <td>{{CATTC | number: 2}} &euro;</td>
            <td>{{annulationTTC | number: 2 }} &euro;</td>
            <td>{{ CAMBPTTC | number: 2}} &euro;</td>
            <td>{{totalComCaTTC | number: 2}} &euro;</td>

        </tr>
        <tr>
            <td>HT</td>
            <td>{{objs.CA_HT | number: 2}} &euro;</td>
            <td>{{objs.annulationHT | number: 2 }} &euro;</td>
            <td> {{CAMBPHT | number: 2}} &euro;</td>
            <td> {{totalComCaHT | number: 2}} &euro;</td>
        </tr>
        <tr>
            <td>nb Vente</td>
            <td> {{objs.nbVente}}</td>
            <td></td>
            <td></td>
            <td></td>

        </tr>
        <tr>
            <td>efficacit&eacute; </td>
            <td>{{efficacite | number:2}} %</td> 
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Panier moyen</td>
            <td>{{panierMoyen | number:2}} &euro;</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        </tbody>
        </table>
