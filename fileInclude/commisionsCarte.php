<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script>
  $(function() {
    $( document ).tooltip();
  });
  </script>

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
            <td>{{objs.nbMBP}}</td>
            <td><a title="50% du prix de vente H.T des MBP">{{objs.nbMBP*objs.comMBP | number:2}}</a></td>
        </tr>

    </tbody>
</table>