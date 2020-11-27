<?php
   // connect to my data base
   try{
   	$bdd = new PDO('mysql:host=localhost;port=3307;dbname=etudiants','root','root');
   }catch(Exception $e){
   	die('Erreur : '.$e->getMessage());
   }

   //insert data to my data base 
   $requete = $bdd->prepare('INSERT INTO etudiants (nom, prenom, cni, cne, naissance, filiere, annee, num, email, image) VALUES (?,?,?,?,?,?,?,?,?,?)');
   if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['cin']) && isset($_POST['cne']) && isset($_POST['upload'])){

   	$image = $_FILES['image']['name'];
   	$target = "images/".basename($image);

   	   $requete->execute(array($_POST['nom'], $_POST['prenom'], $_POST['cin'], $_POST['cne'], $_POST['naissance'], $_POST['filiere'], $_POST['annee'], $_POST['tele'], $_POST['email'], $image));

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
   }
   
?>

<!DOCTYPE html>
<html>
<head>
	<title>Le formulaire</title>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
	<h1>
		Le formulaire à remplir :
	</h1>
	<form class="form-style-9" method="post" action="ajouter.php" enctype="multipart/form-data">
		<ul>
		<li>
		    <input type="text" name="nom" class="field-style field-split align-left" placeholder="Nom" />
		    <input type="text" name="prenom" class="field-style field-split align-right" placeholder="Prénom" />

		</li>
		<li>
			<input type="text" name="cin" class="field-style field-split align-right" placeholder="CNI" />
		    <input type="text" name="cne" class="field-style field-split align-left" placeholder="CNE" />
		</li>
		<li>
			<input type="text" name="email" class="field-style field-split align-right" placeholder="Email" />
		    <input type="text" name="tele" class="field-style field-split align-left" placeholder="Tel" />
		</li>
		<li>
		    <input type="date" name="naissance" class="field-style field-full align-none" placeholder="Date de Naissance" />
		</li>
		<li>
		    <label for="sel1" >Selectionner L'année:</label>
		      <select class="form-control" id="sel1" name="annee">
		        <option>CP1</option>
		        <option>CP2</option>
		        <option>CI1</option>
		        <option>CI2</option>
		        <option>CI3</option>
		      </select>
		</li>
		<li>
		    <label for="sel1" >Selectionner Le filiére:</label>
		      <select class="form-control" id="sel1" name="filiere">
		      	<option>PAS ENCORE</option>
		        <option>INFO</option>
		        <option>GTR</option>
		        <option>INDUS</option>
		        <option>GPMC</option>
		      </select>
		</li>
		<li>
		    <input type="file" name="image" class="field-style field-full align-none"> 
		</li>
		<li>
		    <input type="submit" value="Ajouter" name="upload" />
		    <button type="button" class="btn btn-secondary">
				<a href="profiles.php">Profiles</a>
			</button>
		</li>
		</ul>
	</form>

</body>
</html>

<style type="text/css">
    body{
		background-color: #f5f6fa;
		font-family: "Raleway",sans-serif;
	}
	a:hover{
		text-decoration: none;
		color: white;
	}
	h1{
		font-family:georgia,garamond,serif;
		text-align: center;
	}
	.form-style-9{
		max-width: 450px;
		background: #FAFAFA;
		padding: 30px;
		margin: 50px auto;
		box-shadow: 1px 1px 25px rgba(0, 0, 0, 0.35);
		border-radius: 10px;
		border: 6px solid #305A72;
	}
	.form-style-9 ul{
		padding:0;
		margin:0;
		list-style:none;
	}
	.form-style-9 ul li{
		display: block;
		margin-bottom: 10px;
		min-height: 35px;
	}
	.form-style-9 ul li  .field-style{
		box-sizing: border-box; 
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box; 
		padding: 8px;
		outline: none;
		border: 1px solid #B0CFE0;
		-webkit-transition: all 0.30s ease-in-out;
		-moz-transition: all 0.30s ease-in-out;
		-ms-transition: all 0.30s ease-in-out;
		-o-transition: all 0.30s ease-in-out;

	}.form-style-9 ul li  .field-style:focus{
		box-shadow: 0 0 5px #B0CFE0;
		border:1px solid #B0CFE0;
	}
	.form-style-9 ul li .field-split{
		width: 49%;
	}
	.form-style-9 ul li .field-full{
		width: 100%;
	}
	.form-style-9 ul li input.align-left{
		float:left;
	}
	.form-style-9 ul li input.align-right{
		float:right;
	}
	.form-style-9 ul li textarea{
		width: 100%;
		height: 100px;
	}
	.form-style-9 ul li input[type="button"], 
	.form-style-9 ul li input[type="submit"] {
		-moz-box-shadow: inset 0px 1px 0px 0px #3985B1;
		-webkit-box-shadow: inset 0px 1px 0px 0px #3985B1;
		box-shadow: inset 0px 1px 0px 0px #3985B1;
		background-color: #216288;
		border: 1px solid #17445E;
		display: inline-block;
		cursor: pointer;
		color: #FFFFFF;
		padding: 8px 18px;
		text-decoration: none;
		font: 12px Arial, Helvetica, sans-serif;
	}
	.form-style-9 ul li input[type="button"]:hover, 
	.form-style-9 ul li input[type="submit"]:hover {
		background: linear-gradient(to bottom, #2D77A2 5%, #337DA8 100%);
		background-color: #28739E;
	}
</style>