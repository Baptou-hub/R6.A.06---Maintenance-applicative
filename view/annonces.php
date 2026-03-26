<?php
// Redirige vers la page de login si l'utilisateur n'est pas authentifié
if( !isset($login) or $login=='' ){
    header( "refresh:5;url=index.php" );
    echo 'Erreur de login et/ou de mot de passe (redirection automatique dans 5 sec.)';
    exit;
}
?>

<?php $title= 'Exemple Annonces Basic PHP: Annonces'; ?>

<?php ob_start(); // Met le HTML suivant en mémoire tampon ?>
    <p> Hello <?php echo $login; ?> </p>
    <h1>List of Posts</h1>
    <ul>
        <?php foreach( $annonces as $post ) : ?>
            <li>
                <a href="post.php?id=<?php echo $post['id']; ?>">
                    <?php echo $post['title']; ?>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
<?php $content = ob_get_clean(); // Récupère le buffer dans $content ?>

<?php require 'layout.php'; // Injecte $title et $content dans le squelette ?>