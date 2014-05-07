<?php
require './iniPhp.php';

$mois = new ClasseOutils();
 $salarie = new ClasseAnimatrice($_GET['id']);
 ob_start();?>

<page> 
    <page_header> 
        <h2>Fiche de precompte <?= $salarie->getNom() . " " . $salarie->getPrenom(); ?></h2>
        <h3></h3>
        <table>
            
            <tr valign=top>
                <td><?php include './fileInclude/tableauPrecompte.php'; ?></td>
                <td><?php include './fileInclude/commisionsArgus.php'; ?></td>
            </tr>
            <tr valign=top>
                <td><?php include './fileInclude/commisionsCA.php'; ?></td>
                <td><?php include './fileInclude/commisionsCarte.php'; ?></td>
            </tr>
            <tr valign=top>
                <td><?php include './fileInclude/commisionsFrais.php'; ?></td>
                <td><?php include './fileInclude/gratificationFrais.php'; ?></td>
            </tr>
        </table>            
        <h2>Signature  <img src="http://upload.wikimedia.org/wikipedia/commons/thumb/0/09/Joe_Clark_Signature.svg/642px-Joe_Clark_Signature.svg.png" width="100" alt="IMG_2011"/></h2>
    
    </page_header> 
    <page_footer> 
       

<barcode type="EAN13" value="RE45" label="label" style="width:30mm; height:6mm; color: #770000; font-size: 4mm"></barcode>
    </page_footer> 

</page>  

<?php
$content = ob_get_clean();

try {
    require './html2pdf/html2pdf.class.php';
    $pdf = new HTML2PDF('p', 'A4', 'fr');
    $pdf->pdf->SetDisplayMode('fullpage');
    $pdf->writeHTML($content);
    $pdf->Output('pagetest.pdf');
} catch (HTML2PDF_exception $exc ) {
    echo $exc->getTraceAsString();
    
}
?>