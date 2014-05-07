<?php
require './iniPhp.php';
$outils = new ClasseOutils();
$liste = $outils->getInfoAllAnimatrices();
$listeAR = $outils->getEquipeParStatut(2);
?>
<html lang="fr">
<head>
     <?php require_once  './fileInclude/heade.php'; ?>
  <meta charset="utf-8">
  <title>jQuery UI Droppable - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  
  <style>
 
  </style>
</head>
<body>
 <?php include './fileInclude/barNavigation.php';?>
    <div class="container">
    <div class="container" >
        
        
        <div class="row">
            <h1>Gestion des equipes</h1>
            <?php   $listeAnim = $outils->getListeVRPParResponsable($value->id,0);
            if($listeAnim !=null):?>
            <div class="col-md-2 nonDrag">
                <div class="panel panel-danger">
                    <div class="panel-heading">Sans equipe</div>
                    <div id="null" class="panel-body sortable">
                <?php foreach ($listeAnim as $value) :?>
                    <div id="<?=$value->id?>" class="draggable alert alert-info"><?=$value->nom ?>  <?=$value->label ?></div>
                <?php endforeach;?>
                    </div>
                    </div>
                </div>
            <?php endif;?>
            
                       
            <?php 
            foreach ($listeAR as $key => $value) : ?>
                <?php if($key==5):?>
            </div>
             <div class="row">
            <?php endif;?>
             
            <div class="col-md-2 nonDrag">        
                
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4><?= $value->nom ?> - <?=$value->label ?></h4>
                    </div>
                    <div id="<?= $value->id?>" class="panel-body sortable">
                        
                        <?php $listeAnim = $outils->getListeVRPParResponsable($value->id,1);
                        foreach ($listeAnim as  $value):?>
                        <div id="<?=$value->id?>" class="draggable alert alert-info">
                            <?=$value->nom?> - <small><?=$value->label ?></small>
                        </div>
                        <?php endforeach;?>
                        
                        
                        
                        
                        
                    </div>
                </div>
            </div>
            
                
            <?php endforeach;?>
            
        </div>
        
        
    </div>
        </div>
<script>
    
  $(function() {
  
    
    $('.sortable').sortable({
        connectWith: '.sortable',
        placeholder: "alert alert-warning",
       
        start : function(event, ui){
            ui.helper.addClass('info');
            
        },
        beforeStop: function(event,ui){
            ui.helper.removeClass('info');
        },
        stop : function(event,ui){
            
        console.log(ui.item.attr('id'));
        console.log(ui.item.parent().attr('id'));
            
        var id = ui.item.attr('id');
        var equipe = ui.item.parent().attr('id');
        chgEquipe(id, equipe);
        }
    }).disableSelection();
    
    
    
    
  });
  
  
  function chgEquipe(id, equipe){
      
     var urlId = 'action/changeEquipe.php?';
      urlId += 'id='+id;
      urlId += '&equipe='+equipe;
     
     
       $.ajax({
            type: 'GET',
            url: urlId,
            timeout: 3000,
            dataType : "html" ,
            success: function(html) {
              console.log(html);
                
            },
            error: function() {
                alert('La requête n\'a pas abouti ');
            }
        });
  }
  
  
  </script>
</body>
</html>