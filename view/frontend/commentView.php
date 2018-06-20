<?php $title = 'Billet pour l\'Alaska'; ?>


<?php ob_start(); ?>
<div class="container commentaire">
    <div class="jumbotron jumbotron-fluid commentaire">
        <h1>Commentaires</h1>
        <br>
        <h4><?= nl2br(htmlspecialchars($comment['comment'])) ?></h4>
        <br>
        <p>En attente de modération.......</p>
        
    </div>

</div>

<?php $content = ob_get_clean(); ?>
<?php require'view/frontend/template.php'; ?>
