<?php
// Charge le modèle contenant les fonctions d'accès à la BDD
require_once 'model.php';

// Si l'utilisateur est authentifié, on récupère ses infos et les annonces
if( isUser($_POST['login'], $_POST['password']) ) {
    $login = $_POST['login'];
    $annonces = getAllAnnonces();
}

// Affiche la vue avec les données
require 'view/annonces.php';
?>