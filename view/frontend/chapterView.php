<?php $title = 'Billet pour l\'Alaska'; ?>

<?php  ob_start(); ?>

<div class="container">
    <div class="jumbotron jumbotron-fluid">
        <h1><strong><?= ($chapter['title']) ?></strong></h1>
        <p class="date"><em> le <?= $chapter['creation_date_fr'] ?></em><p>
        <p><?= ($chapter['content']) ?></p>
    </div>
    <div class="jumbotron jumbotron-fluid">
        <h2><strong>Commentaires</strong></h2>
        <?php while ($comment = $comments->fetch()): ?>
        <p><strong><?= htmlspecialchars($comment['author']) ?><br></strong>le <?= $comment['comment_date_fr'] ?></p>
        <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
        <a href="index.php?action=signalComment&amp;id=<?= $comment['id']; ?>&amp;chapterId=<?= $_GET['id']; ?>"> (signaler)</a>
        <br><br>
        <?php endwhile; ?>
        <p><strong>Ajoutez un commentaire si vous le voulez!</strong></p>
            <form class="comment" action="index.php?action=addComment&amp;id=<?= $chapter['id'] ?>" method="post">
                <div>
                    <label for="author">Auteur</label><br>
                    <input type="text" id="author" name="author">
                </div>
                <div>
                    <label for="comment">Commentaire</label><br>
                    <textarea id="comment" name="comment"></textarea>
                </div>
                <div>
                    <input type="submit" />
                </div>
            </form>
    </div>
</div>

<?php  $content = ob_get_clean(); ?>
<?php require 'template.php'; ?>
