<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		<?= $title ?>
	</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
	<link href="public/css/style.css" rel="stylesheet" />
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar" style="background-color=white">
	<header>
		<!-- Navigation
      ================================================== -->
		<nav class="navbar navbar-expand-lg navbar fixed-top navbar-dark bg-dark">
			<a class="navbar-brand" href="../../adminIndex.php">Jean Forteroche</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="../../adminIndex.php">Chapitres</a>
					</li>
					<li class="nav-item">
						<a class="nav-link deconnexion" href="../../adminIndex.php">Déconnexion</a>
					</li>
				</ul>
			</div>
		</nav>
	</header>



	<?= $content ?>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</body>

</html>
