<?php $title = 'Administration'; ?>

<?php  ob_start(); ?>

<div class="container">
    <div class="jumbotron jumbotron-fluid">
        <img class="col-sm-12 col-md-5" src="../../img/newYork.jpg" alt="new york">

        <h1>
        <?= htmlspecialchars($chapter['title']) ?>
        </h1>
        <br><br>
        <em> le <?= $chapter['creation_date_fr'] ?></em>
        <br>
        <p>
        <?= nl2br(htmlspecialchars($chapter['content'])) ?>
        </p>
    </div>
    <div class="jumbotron jumbotron-fluid">
        <h2><strong>Commentaires</strong></h2>
        <?php
        while ($comment = $comments->fetch()) {
        ?>
        <p>
        <strong><?= htmlspecialchars($comment['author']) ?><br></strong>le
        <?= $comment['comment_date_fr'] ?><a href="index.php?action=comment&amp;id=<?= $comment['id'] ?>"></a>
        </p>
        <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
    <br><br>
        <?php
        }
        ?>
    </div>
    <div class="jumbotron jumbotron-fluid">
        <h2><strong>Modifier le chapitre</strong></h2>
        <form name="formulaire" id="formulaire" action="index.php?action=modifyChapter&amp;id=<?= $chapter['id'] ?>" method="post">
            <input type="hidden" name="id" value="<?= $chapter['id'] ?>">
            <div class="form-group">
                <label for="title"><strong>Titre</strong></label> : 
                <input class="form-control" type="text" name="title" id="title" value="<?= nl2br(htmlspecialchars($chapter['title'])) ?>">
            </div>
            <div class="form-group">
                <label for="content"><strong>Nouveau texte :</strong></label> 
                <textarea id="content" name="content" rows="25" cols="98"><?= nl2br(htmlspecialchars($chapter['content'])) ?></textarea>
            </div>
            <div class="mt-5">
            <input type="submit" value="Modifier"> Ou
            </div>
        </form> 
        <form name="formulaire" id="formulaire" action="index.php?action=deleteChapter&amp;id=<?= $chapter['id'] ?> " method="post">
            <div class="delete">
                <input type="submit" value="Supprimer ce chapitre">
            </div> 
        </form>
    </div>
<script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
    tinyMCE.init({
       mode: "textareas"
    });
</script> 
</div>
<?php  $content = ob_get_clean(); ?>
<?php require 'view/backend/template.php'; ?>
