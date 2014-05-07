<table class="table" >
            
            <tbody>
                <tr>
                    <td colspan="2" style="text-align: center" >
                        BORDEREAU DU  {{ objs.dateFormat | uppercase}}  
                    </td>
                </tr>
                <tr>
                    <td>Statut</td>
                    <td><?=$salarie->getStatut();?> </td>
                    
                </tr>
                <tr>
                    <td>Nombre de Jours travaill&eacute;s d&eacute;clar&eacute;s</td>
                    <td>{{ objs.nbJourDeclare}}</td>
                    
                </tr>
                
                <tr>
                    <td>Nombre de FO annonc&eacute;es au responsable</td>
                    <td>{{ objs.nbFOannonce}}</td>
                    
                </tr>
                <tr>
                    <td>Nombre de FO reçues</td>
                    <td>{{ objs.nbFOrecu}}</td>
                </tr>
                <tr>
                    <td>Nombre de FO retourn&eacute;es</td>
                    <td>{{objs.nbFOrecu}}</td>
                    
                </tr>
                <tr>
                    <td >Nombre de FO valid&eacute;es sur le mois en cours</td>
                    <td>{{totalFO}}</td>
                    
                </tr>
                <tr>
                    <td>TOTAL FO</td>
                    <td>{{totalFO}}</td>
                    
                </tr>
               
            </tbody>
        </table>