<?php
require_once dirname(__DIR__) . "/model/noteModele.php";


function accueil()
{

    $classes = getAllTable('classes');

    $matieres =  getAllTable('matieres');
    $periodes = getAllTable('periodes');


    require_once dirname(__DIR__) . "/view/noteView.html.php";
}
