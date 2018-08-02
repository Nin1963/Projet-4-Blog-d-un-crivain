<?php $title = 'Billet pour l\'Alaska'; ?>

<?php ob_start(); ?>

<div class="container commentaire">
    <div class="jumbotron jumbotron-fluid commentaire">
        <h1><strong>Commentaires</strong></h1>
        <p>Ce commentaire est en attente de modération.<br> 
        Je me dépêche  ;)</p>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require'template.php'; ?>
