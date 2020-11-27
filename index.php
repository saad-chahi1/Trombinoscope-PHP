<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<title>Trombinoscope</title>
</head>
<body>
	<img src="téléchargement.png" class="img1">
	<img src="téléchargement (1).png" class="img2">
	<div class="index">
		<p>
			A travers notre application vous pourriez désormais créer un Trombinoscope pour toutes et tous les étudiant(e)s de ENSA safi.
			L'utilistaion de notre application est trés facile, il suffit de suivre les instructions.
			Pour la créaction d'un nouveau profile il faut remplir la formulaires par les informations d'étudiant, le nom, le..., aprés faire l'enregistrement, et voilà notre profile à bien enregistrer dans notre base de données, et vous pourriez voir ca via l'interface "Profiles".
			Il y a aussi des autres possibilités comme le filtrage pour garder juste une catégorie des étudiants.       
		</p>
		<br>
		<br>
		<div>
			<button type="button" class="btn btn-info">
				<a href="ajouter.php">Ajouter</a>
			</button>
			<button type="button" class="btn btn-secondary">
				<a href="profiles.php">Profiles</a>
			</button>
		</div>
	</div>

</body>
</html>

<style type="text/css">
	body{
		background-color: #f5f6fa;
		font-family: "Raleway",sans-serif;
	}
	.img1{
       width: 25%;
       height: 10%;
       margin: 18px;
	}
	.img2{
	   width: 8%;
       height: 6%;
       float: right;
       margin-top: 5px;
       margin-right: 30px;
	}
	.index{
		width: 65%;
		margin: auto;
		margin-top: 4%;
		text-align: center;
		padding: 17px;
		border: 1px solid rgba(0,0,0,.125);
        border-radius: .25rem;
        box-shadow: 0 2px 4px rgba(0,0,0.13,0.35);
	}
	p{
		font-family:georgia,garamond,serif;
		font-size:26px;
		font-style:italic;
	}
	a{
		color: white;
	}
	a:hover{
		text-decoration: none;
		color: white;
	}
</style>