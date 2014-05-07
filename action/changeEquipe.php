<?php
require '../classes/ClasseOutils.php';

$outils = new ClasseOutils();


if ($_GET['id']!=null && $_GET['equipe']!=null ){
    $anim = $_GET['id'];
    $equip = $_GET['equipe'];
    $outils->changeEquipe($anim, $equip);
}

?>