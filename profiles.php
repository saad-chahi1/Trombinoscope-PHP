<?php
   try{
   	  $bdd = new PDO('mysql:host=localhost;port=3307;dbname=etudiants','root','root');
   }catch(Exception $e){
   	  die('Erreur : '.$e->getMessage());
   }
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<title>Les étudiants</title>
</head>
<body>
	<h2 class="h3">Le trombinoscope de toutes les étudiant(e)s d'ENSA safi</h2>
	<form class="form-style-9" method="get" action="profiles.php">
		<ul>
			<table>
				<tr>
					<td>
						<li>
						    <label for="sel1" >Triage en :</label>
						      <select class="form-control" id="sel1" name="type">
						        <option>Ordre Alphabétique</option>
						      </select>
						</li>
					</td>
					<td>
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
					</td>
					<td>
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
					</td>
					<td>
						<li>
						    <input type="submit" value="OK !!" name="upload" />
						</li>
						<?php
		                    if(!(isset($_GET['type']) == "")){
								echo "<li><button>";
									echo "<a href='profiles.php'>Retourner</a>";
								echo "</li></button>";
							}else{
								echo "<li><button>";
									echo "<a href='index.php'>Acceuil</a>";
								echo "</li></button>";
							}
						?>
					</td>
				</tr>
			</table>
		</ul>
	</form>
    <?php
	   if(isset($_GET['type']) == ""){
	   	 $result = $bdd->query('SELECT * FROM etudiants');
	   }else{
	   	 $result = $bdd->prepare('SELECT * FROM etudiants WHERE filiere = ? AND annee = ? ORDER BY nom');
	   	 $result->execute(array($_GET['filiere'], $_GET['annee']));
	   }
	   
	    while ($row = $result->fetch()) {
	      echo "<div id='img_div' class='col-lg-2 col-md-4 col-xd-12'>";
	      	echo "<img src='images/".$row['image']."' width='300' height='170'> <br>";
	      	echo "<p><a href='profile.php?id=".$row['id']."'>".$row['prenom']." ".$row['nom']."</a></p>";
	      	if ($row['filiere'] == 'PAS ENCORE'){
	      	   echo "<p class='span'>".$row['annee']."</p>";
	      	}else{
	      		echo "<p class='span'>".$row['filiere']."</p>";
	      	}
	      echo "</div>";
	    }
    ?>
</body>
</html>

<style type="text/css">
	body{
		padding: 20px;
		background-color: #f5f6fa;
		font-family: "Raleway",sans-serif;
	}
	h2{
		font-family:georgia,garamond,serif;
		color: #576574;
		font-style:italic;
		text-align: center;
		margin: 17px;
	}
	a{
		color: #222f3e;
	}
	a:hover{
		text-decoration: none;
		color: #222f3e;
	}
	.span{
		font-family:georgia,garamond,serif;
		font-size:20px;
		color: #636e72;
		font-style:italic;
		text-align: center;
	}
	p{
		font-family:georgia,garamond,serif;
		font-size:26px;
		text-align: center;
		color: #222f3e;
	}
	#img_div{
		display:inline-block;
	   	padding: 5px;
	   	margin: 15px auto;
	    border: 1px solid #cbcbcb;
    }
	#img_div:after{
	   	content: "";
	   	display: block;
	   	clear: both;
	}
    img{
    	border-radius: 50%;
    	margin-left: auto;
        margin-right: auto;
        display: block;
    	width: 80%;
    }
    .form-style-9{
		max-width: 60%;
		background: #FAFAFA;
		padding: 0.25%;
		margin: 2% auto;
		box-shadow: 1px 1px 25px rgba(0, 0, 0, 0.35);
		border-radius: 10px;
		border: 3px solid #305A72;
	}
	.form-style-9 ul{
		padding:0;
		margin:0;
		list-style:none;
	}
	.form-style-9 ul li{
		display: block;
		padding: 14px;
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