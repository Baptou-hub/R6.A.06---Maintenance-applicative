<?php $title= 'Exemple Annonces Basic PHP: Post'; ?>

<?php ob_start(); // Met le HTML suivant en mémoire tampon ?>
    <h1><?php echo $post['title']; ?></h1>
    <div class="date"><?php echo $post['date']; ?></div>
    <div class="body"><?php echo $post['body']; ?></div>
<?php $content = ob_get_clean(); // Récupère le buffer dans $content ?>

<?php require 'layout.php'; // Injecte $title et $content dans le squelette ?>