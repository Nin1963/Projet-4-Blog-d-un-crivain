

<?php $title = 'Administration'; ?>

<?php ob_start(); ?>
<div class="container">
<div class="jumbotron jumbtron-fluid">
        <h1>Commentaires signalés</h1>
            <table class="table table-bordeless">
                <tbody>
                <?php while ($comment = $comments->fetch()): ?>
                    <tr>
                    <form action="index.php? action=">
                        <td scope="row"><?= htmlspecialchars($comment['title']) ?>
                        </td>
                        <td scope="row"><?= htmlspecialchars($comment['author']) ?></td>
                        <td scope="row"><?= htmlspecialchars($comment['comment']) ?></td>
                        <td scope="row"><?= htmlspecialchars($comment['comment_date_fr']) ?></td>
                        <td scope="row">
                        
                            <input type="submit" value ="supprimer">
                            </td>
                        </form>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require 'view/backend/template.php'; ?>