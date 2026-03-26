<?php
// Charge le modèle contenant les fonctions d'accès à la BDD
require_once 'model.php';

// Récupère l'annonce correspondant à l'id passé en paramètre GET
$post = getPost($_GET['id']);

// Affiche la vue avec les données
require 'view/post.php';
?>