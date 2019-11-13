 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/renseignement.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title>Inscription</title>
</head>
<body>
	<div class="container">
	<form action="#" method="POST">
		<div class="row">
			<div class=" offset-md-3"></div>
			<div class="col-md-6">
				<h3>REGISTER</h3>
				
				<input type="text" class="form-control espace" name="pseudo" placeholder="username">
				
				<input type="email" class="form-control espace" name="email" placeholder="email">
				<input class="form-control espace" type="password" name="motDePasse" placeholder="mot de passe">
				<input class="form-control espace" type="password" name="repeterMotDePasse" placeholder="repeter votre mot de passe">
				<input class="btn btn-info espace form-control" type="submit" name="monBoutton" value="s'inscrire">
				<?php
     				 
				    try {
					    if (isset($_POST["monBoutton"])){
							$pseudo=$_POST["pseudo"];
							$email = $_POST["email"];
							$motDePasse=$_POST["motDePasse"];
				            $repeterMotDePasse=$_POST["repeterMotDePasse"];
				         
						    if  (!empty($pseudo) && (!empty($email)) && (!empty($motDePasse))){
						    	if( strlen($_POST['motDePasse']) >= 6){
						    	  
							    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
							    	
							    	if ($motDePasse==$repeterMotDePasse) {
						             $conn = new PDO("mysql:host=localhost;dbname=authentification", "root", "");
						            // set the PDO error mode to excepti
                                    
						            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						            $sql = "INSERT INTO users (pseudo, email, password)
						            VALUES ('$pseudo','$email','$motDePasse')";
						            // use exec() because no results are returned
						           
						            $conn->exec($sql);


		                            ?>
			                        <div class="alert alert-success alert-dismissible espace">
				       	            <button type="button" class="close" data-dismiss="alert">&times;</button><?php echo "Inscription reussie";?></div>
				       	            <?php
			                    }
                                else{
                	                ?>
			                        <div class="alert alert-success alert-dismissible espace">
			         	            <button type="button" class="close" data-dismiss="alert">&times;</button><?php echo "Les deux mots de passe doivent être identiques";?></div>
			                       <?php   
		                        }
							    }
			        
								    else {
								    	?>
			                        <div class="alert alert-success alert-dismissible espace">
			         	            <button type="button" class="close" data-dismiss="alert">&times;</button><?php echo "Le mail est non valide";?></div>
			         	              <?php
			                                                    
			        }
			        }
								    else {
								    	?>
			                        <div class="alert alert-success alert-dismissible espace">
			         	            <button type="button" class="close" data-dismiss="alert">&times;</button><?php echo"Votre mot de passe doit contenir minimum 6 caractères";?></div>
			                       <?php   
			                         								    		
		}
		}


		else{
			?>
		    	<div class="alert alert-success alert-dismissible espace">
			       	<button type="button" class="close" data-dismiss="alert">&times;</button><?php echo "Veuillez saisir tous les champs";?></div>
		    	<?php
		    }
		}
		}	

		    
		catch(PDOException $e)
		    {
		    echo $sql . "<br>" . $e->getMessage();
		    }
?>
		    </div>
		    <div class=" offset-md-3"></div>
		</div>
	</form>
	

</div>
</body>
</html>