<?php
// NOUVEAU
?>

<table class="table" >
    <tbody>
        <tr>
            <td colspan="2" style="text-align: center" >
                BORDEREAU MOIS DE <?php echo(strtoupper($mois->getDateCour())); ?>  {{totalGeneral | number:2}}&euro;
            </td>
        </tr>
        <tr>
            <td>Date entree</td>
            <td><?= $salarie->getDateEntre(); ?></td>
    
        </tr>
        <tr>
            <td>Statut</td>
            <td><?= $salarie->getStatut(); ?></td>
        </tr>
        <tr>
            <td>Nb de Jours travaillés déclarés</td>
            <td><input type="text" 
                       name="nbJourDeclare" 
                       value="{{objs.nbJourDeclare}}" 
                       size="3" /></td>
        </tr>
        <tr>
            <td>Nb de FO annoncées au responsable</td>
            <td><input type="text"  
                       name="nbFOannonce" 
                       value="{{objs.nbFOannonce}}" size="3" /></td>
        </tr>
        <tr>
            <td>Nb de FO reçues</td>
            <td><input type="text" name="nbFOrecu" 
                       ng-model="objs.nbFOrecu" 
                       value="{{objs.nbFOrecu}}" 
                       size="3" ng-change="change()" size="3" required />
            </td>
        </tr>
        <tr>
            <td>Nb de FO retournées</td>
            <td>
                <input type="text"  name="nbFOretour" value="{{objs.nbFOretour}}" 
                       ng-model="objs.nbFOretour" size="3" ng-change="change()" required />
            </td>
        </tr>
        <tr>
            <td >Nb de FO validées sur le mois en cours</td>
            <td >{{totalFO}}</td>
        </tr>
        <tr>
            <td>TOTAL FO</td>
            <td >{{totalFO}}</td>
        </tr>
    </tbody>
</table>
    
<input type="hidden" name="id" value="<?= $salarie->getId(); ?>"/>
