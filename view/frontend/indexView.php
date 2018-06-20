<?php $title = 'Billet pour l\'Alaska'; ?>

<?php  ob_start(); ?>



	<div class="container">
		<div class="jumbotron row" id="accueil">
			<h1 class="text-center">Billet pour l'Alaska</h1>
			<h2>Bienvenue sur mon blog</h2>
			<br>
			<img class="col-sm-12 col-md-5" src="public/img/livre.jpg" alt="livre">
			<p class="col-sm-12 col-md-7">Pour mon nouveau livre "Billet pour l'Alaska", je souhaiterai vous inviter à collaborer avec moi. Comment? Tout simplement en me laissant vos commentaires sur les chapitres que je mettrai en ligne. Vos commentaires seront une matière précieuse pour nourrir mon imagination. Une nouvelle forme d'écriture, d'échanges entre les lecteurs et l'auteur. </p>
		</div>
	<div class="jumbotron row">
			<h1 class="text-center">Chapitres</h1>
			<br>
			<img class="col-sm-12 col-md-5 col-md-push-7" src="public/img/chapitre.jpg" alt="chapitre">
<?php
while ($data = $chapter->fetch())
{
?>
			<p class="col-sm-12 col-md-7 col-md-pull-5">J'ai déjà écrit trois<a href="index.php?action=chapter&amp;id=<?= $data['id'] ?>"> chapitres.</a><br>New York<br>La panne<br>Le départ</p>
<?php
$chapter->closeCursor();
}
?>	
		</div>
	<div class="jumbotron" id="contact">
			<h1 class="text-center">Pour me contacter</h1>
			<br>
			<form class="row">
				<div class="form-group col-lg-4">
					<input type="email" class="form-control" placeholder="Votre email">
				</div>
				<div class="form-group col-lg-8">
					<textarea class="form-control" rows="3" placeholder="Votre message"></textarea>
				</div>
				<div class="form-group col-lg-12">
					<button type="submit" class="btn btn-default pull-right">Envoyer</button>
				</div>
			</form>
		</div>
	</div>
		
	
<?php  $content = ob_get_clean(); ?>
<?php require 'view/frontend/template.php'; ?>

