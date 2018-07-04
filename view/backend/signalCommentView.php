

<?php $title = 'Administration'; ?>

<?php ob_start(); ?>
<div class="container">
<div class="jumbotron jumbtron-fluid">
        <h1>Commentaires signalés</h1>
            <table class="table table-bordeless">
                <tbody>
                <?php while ($data = $signals->fetch()): ?>
                
                    <tr>
                        <td scope="row"><?= htmlspecialchars($data['signal_comment'] = 1) ?>>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require 'view/backend/template.php'; ?>