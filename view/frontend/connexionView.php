<?php $title = 'Administration'; ?>

<?php  ob_start(); ?>

<div class="container">

	<div class="jumbotron jumbotron-fluid mot_de_passe">
	<h1 class="pass">Mot de passe</h1>
	<h3>Veuillez remplir ces champs avec votre login et votre mot de passe pour accéder à la partie administration de votre site</h3>
	
		<form name="password" id="password" action="../../adminIndex.php?action=listChapters" method="post">
			<label for="login">Login : </label>
			<input type="text" name="login"><br><br>
			<label for="password">Mot de passe : </label>
			<input type="password" name="password" /><br><br>
			<input type="submit" name="valider" value="Valider">
		</form>
		
	</div>
</div>

<?php  $content = ob_get_clean(); ?>
<?php require 'template.php'; ?>


