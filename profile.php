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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<title>Profile</title>
</head>
<body>

	<img src="téléchargement.png" class="img1">
	<img src="téléchargement (1).png" class="img2">
	<br><br>
	<div class="all">
	<?php
	   	$result = $bdd->prepare('SELECT * FROM etudiants WHERE id = ?');
	   	$result->execute(array($_GET['id']));

	    while ($row = $result->fetch()) {
	      echo "<div id='img_div'>";
	      	echo "<img src='images/".$row['image']."' width='300' height='170' class='img'> <br>";
	      	echo "<div id='divInfo'> <table>";
	      	echo "<tr><td><p> <strong>Le nom : </strong>".$row['nom']."</td><td><strong> Le prénom : </strong></strong>".$row['prenom']."</p></td></tr>";
	      	echo "<tr><p><td> <strong>CIN : </strong>".$row['cni']."</td><td><strong> CNE : </strong>".$row['cne']."</p></td></tr>";
	      	if ($row['filiere'] == 'PAS ENCORE'){
	      	   echo "<tr><td><p> <strong> L'annee : </strong>".$row['annee']."</p></td></tr>";
	      	}else{
	      		echo "<tr><td><p> <strong>Le filière : </strong>".$row['filiere']."</td><td><strong> L'annee : </strong>".$row['annee']."</p></td></tr>";	 
	      	}
	      	echo "<tr><td><p> <strong>TEL : </strong>".$row['num']."</td><td><strong> EMAIL : </strong>".$row['email']."</p></td></tr>";
	      	echo "<tr><td><p> <strong>La Date de naissance : </strong>".$row['naissance']."</p></td>";
	      	echo "</table></div></tr>";
	      echo "</div>";
	    }
    ?>
    </div>
</body>
</html>

<style type="text/css">
	.all{
		display: flex;
        justify-content: center;
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
	#img_div{
		max-width: 70%;
		display:inline-block;
	   	padding: 5px;
	   	margin: 15px auto;
    }
	#img_div:after{
	   	content: "";
	   	display: block;
	   	clear: both;
	}
    .img{
    	border-radius: 50%;
    	margin-left: auto;
        margin-right: auto;
        display: block;
    	width: 20%;
    }
    #divInfo{
       	margin: auto;
    	padding-left: 12%;
    }
    body{
		background-color: #f5f6fa;
		font-family:georgia,garamond,serif;
		font-size:24px;
		margin: 1%;
	}
</style>