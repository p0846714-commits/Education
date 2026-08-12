<?php


require_once dirname(__DIR__)."/config/database.php";



function getAllClasse(){
    $pdo = connexionDB();
    $sql ="
        SELECT * FROM classes;
    ";

     $classes = query($pdo,$sql,false);
    return $classes; 
}



function getAllMatiere(){
    $pdo = connexionDB();
    $sql ="
        SELECT * FROM matiere;
    ";
    
    $matieres = query($pdo,$sql,false);
    return $matieres;
}



function getAllPeriode(){
    $pdo = connexionDB();
    $sql ="
        SELECT * FROM periode;
    ";
    
    $periodes = query($pdo,$sql,false);
    return $periodes;

}


function getAllMoyenne(){
    $pdo = connexionDB();
    $sql = "

    SELECT ROUND(COALESCE(AVG(moyenne_eleve),0),2) as moyenne_general 
    FROM(
        SELECT inscription_id,
    ROUND(AVG((COALESCE(devoir1,0)+COALESCE(devoir2,0)+2*COALESCE(composition,0))/4),2) AS moyenne_eleve
    FROM evaluations ev
    INNER JOIN 
    inscriptions i ON i.id = ev.inscription_id
    WHERE 
    i.classe_id=2
    AND ev.matiere_id=1
    AND ev.periode_id=1
    GROUP BY inscription_id);

    ";

    $moyenne = query($pdo,$sql,false);
    return $moyenne;
}