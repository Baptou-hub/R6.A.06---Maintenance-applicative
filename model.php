<?php
require_once 'config.php';

// Ouvre une connexion à la base de données et la retourne
function openConnection()
{
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    return $link;
}

// Ferme la connexion à la base de données
function closeConnection($link)
{
    mysqli_close($link);
}

// Vérifie si un utilisateur existe en BDD avec le login et mot de passe fournis
function isUser($login, $password)
{
    $isuser = False;
    $link = openConnection();

    // Requête pour chercher l'utilisateur correspondant
    $query = 'SELECT login FROM Users WHERE login="'.$login.'" and password="'.$password.'"';
    $result = mysqli_query($link, $query);

    // Si au moins un résultat, l'utilisateur existe
    if( mysqli_num_rows($result) )
        $isuser = True;

    mysqli_free_result($result);
    closeConnection($link);

    return $isuser;
}

// Retourne toutes les annonces de la BDD sous forme de tableau associatif
function getAllAnnonces()
{
    $link = openConnection();

    // Récupère uniquement l'id et le titre de chaque annonce
    $result = mysqli_query($link, 'SELECT id, title FROM Post');
    $annonces = array();

    // Parcourt les résultats et les stocke dans un tableau
    while ($row = mysqli_fetch_assoc($result)) {
        $annonces[] = $row;
    }

    mysqli_free_result($result);
    closeConnection($link);

    return $annonces;
}

// Retourne une annonce spécifique selon son identifiant
function getPost($id)
{
    $link = openConnection();

    // intval() sécurise l'id en forçant le type entier
    $id = intval($id);
    $result = mysqli_query($link, 'SELECT * FROM Post WHERE id='.$id);
    $post = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    closeConnection($link);

    return $post;
}
?>
