<?php
session_start();
if ((!isset($_SESSION['administrateur'])) || (empty($_SESSION['administrateur']))) {
    header ('Location: view/frontend/ErrorView');
}
?>
<?php  $title = 'Administration'; ?>

<?php ob_start(); ?>
<div class="container">
    <div class="jumbotron jumbotron-fluid">
        <h1>Bienvenue <br> dans la partie administration de votre site!</h1>
        <br><br>
        <h2>La partie administration est l'endroit du site où vous pourrez gérer la publication, la modification ou la suppréssion de vos chapitres. Vous avez aussi la charge de modérer les "commentaires signalés" laissés sur votre site (<a href="http://eduscol.education.fr/internet-responsable/ressources/legamedia/liberte-d-expression-et-ses-limites.html">rappel de la liberté d'expression et de ses limites</a>)</h2>
    </div>
    <?php  include 'view/flash.php';?>
    <div class="jumbotron jumbotron-fluid">
        <h1 class="chapitre">Chapitres</h1>
            <table class="table table-borderless table-dark">
                <tbody>
                <?php while($data = $chapters->fetch()): ?>
                    <tr>
                        <td scope="row"><?= htmlspecialchars($data['title']) ?><a href="index.php?action=chapterBackend&amp;id=<?= $data['id'] ?>"> (modifier) ou (supprimer)</a></td>
                    </tr>
                <?php endwhile; ?>
                </tbody> 
            </table>
    </div>
    <div class="jumbotron jumbotron-fluid">
        <h2><a href="index.php?action=commentSignal">Commentaires signalés</a></h2>
    </div>
    <div class="jumbotron jumbotron-fluid">
        <h2><strong>Ajouter un chapitre</strong></h2>
            <form action="index.php?action=addChapter" method="post">
                <p>
                    <label for="title"><strong>Titre</strong></label> : <input type="text" name="title" id="title">
                </p>
                <p>
                    <label for="content"><strong>Nouveau chapitre :</strong></label> 
                    <textarea id="content" name="content" rows="25" cols="98"></textarea>
                </p>
                <button>Ajouter</button>
            </form>
    </div>
</div>

<script type="text/javascript" src="view/backend/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
    tinyMCE.init({
        mode : "textareas"
    });
</script>

<?php $content = ob_get_clean(); ?>
<?php require 'view/backend/template.php'; ?>