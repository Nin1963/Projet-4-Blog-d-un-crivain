<?php $title = 'Billet pour l\'Alaska'; ?>

<?php ob_start(); ?>
<div class="container">
    <div class="jumbotron" id="accueil">
        <h1 class="chapitre">Billet pour l'Alaska</h1>
        <br>
        <h2>Bienvenue sur mon blog</h2>
        <br>
        <div class="row align-items-start">
            <img class="col-4" src="public/img/livre.jpg" alt="livre">
            <p class="col-8" id="bienvenue">Pour mon nouveau livre "Billet pour l'Alaska", je souhaiterai vous inviter à collaborer avec moi. Comment? Tout simplement en me laissant vos commentaires sur les chapitres que je mettrai en ligne. Vos commentaires seront une matière précieuse pour nourrir mon imagination.<br>Vous respecterez, bien entendu, un minimum de règles élémentaires juridiques et/ou de courtoisie (je me reserve le droit de supprimer ou non tous commentaires signalés).<br>
            Une nouvelle forme d'écriture, d'échanges entre les lecteurs et l'auteur. </p>
        </div>
    </div>
    <div class="jumbotron jumbotron-fluid">
        <h1 class="chapitre">Chapitres</h1>
        <h2 class="ecrit">Derniers chapitres écrits</h2>

    <?php while ($data = $chapters->fetch()): ?>

        <h2><strong><a href="index.php?action=chapter&amp;id=<?= $data['id'] ?>"><?= htmlspecialchars($data['title']) ?></a></strong></h2><em>le <?= $data['creation_date_fr'] ?></em>
        <p><?= nl2br(htmlspecialchars($data['content'])) ?></p>

    <?php endwhile; ?>

    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require'view/frontend/template.php'; ?>
