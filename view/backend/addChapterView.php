<?php $title = 'Administration'; ?>

<?php  ob_start(); ?>

<div class="container">
    <div class="jumbotron jumbotron-fluid">
        <h2><strong>Ajouter un chapitre</strong></h2>
            <form action="adminIndex.php?action=addChapter&amp;id=" method="post">
                <label for="title"><strong>Titre</strong></label> : <input type="text" name="title" id="title"><br><br>
                <label for="content"><strong>Nouveau chapitre :</strong></label> 
                <textarea id="content" name="content" rows="25" cols="150"></textarea>
                <br><br>
            </form>
            <button style="margin-left:150px">Ajouter</button>
    </div>
</div>

<script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
    tinyMCE.init({
        mode : "textareas"
    });
</script>
<?php  $content = ob_get_clean(); ?>
<?php require 'view/backend/template.php'; ?>