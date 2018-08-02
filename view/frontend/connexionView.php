<?php $title = 'Administration'; ?>

<?php  ob_start(); ?>

<div class="container">
    <div class="jumbotron jumbotron-fluid mot_de_passe">
        <h1 class="pass"><strong>Mot de passe</strong></h1>
        <h3>Veuillez remplir ces champs avec votre login et votre mot de passe pour accéder à la partie administration de votre site</h3>
        <h6 style="text-align:center">si votre mot de passe est erroné, vous reviendrez sur cette page ;)</h6>
        <form name="password" id="password" action="index.php?action=login" method="post">
            <label for="login">Login : </label>
            <input type="text" name="login" required><br><br>
            <label for="password">Mot de passe : </label>
            <input type="password" name="password" required /><br><br>
            <input type="submit" name="connexion" value="Connexion">
        </form>
    </div>
</div>

<?php  $content = ob_get_clean(); ?>
<?php require 'template.php'; ?>


