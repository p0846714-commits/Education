<?php


function login(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];
        
    }

require_once dirname(__DIR__)."/view/connexion.html.php";
}
