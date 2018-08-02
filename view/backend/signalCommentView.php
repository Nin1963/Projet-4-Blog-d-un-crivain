<?php $title = 'Administration'; ?>

<?php ob_start(); ?>

<div class="container">
    <div class="jumbotron jumbtron-fluid">
        <h1><strong>Commentaires signalés</strong></h1>
        <div class="table-responsive">
            <table class="table table-bordeless table-hover table-dark">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Chapitres</th>
                        <th scope="col">Auteur</th>
                        <th scope="col">Commentaire</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                <?php while ($comment = $comments->fetch()): ?>
                <form action="index.php?action=deleteComment&amp;id=<?= $comment['id'] ?> " method="post">
                    <tr>
                        <th scope="row"><?= htmlspecialchars($comment['title']) ?></th>
                        <td><?= htmlspecialchars($comment['author']) ?></td>
                        <td><?= htmlspecialchars($comment['comment']) ?></td>
                        <td><?= htmlspecialchars($comment['comment_date_fr']) ?></td>
                        <td><input type="submit" value ="supprimer"></td>
                </form>
                <form action="index.php?action=approveComment&amp;id=<?= $comment['id'] ?> " method="post">
                        <td><input type="submit" value ="approuver"></td>
                    </tr>
                </tbody>
                </form>
                <?php endwhile; ?>
            </table>
            </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require 'view/backend/template.php'; ?>