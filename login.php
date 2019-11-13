<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title>Inscription</title>
</head>
<body>
	<div class="container">
	<form action="#" method="POST">
		<div class="row">
			<div class=" offset-md-3"></div>
			<div class="col-md-6">
				<h3>Please sign in</h3>
				
				<input type="text" class="form-control espace" name="pseudo" placeholder="Username">
				<input class="form-control espace" type="password" name="motDePasse" placeholder="Mot de passe">
				<input class="btn btn-info espace form-control" type="submit" name="monBoutton" value="Se connecter">


			<?php
     				 
				    try {
					    if (isset($_POST["monBoutton"])){
						   $_SESSION["pseudo"]= $_POST["pseudo"];
                           $_SESSION["motDePasse"]=$_POST["motDePasse"] ;
                            

				         
						    if  (!empty( $_POST["pseudo"]) && (!empty(  $_POST["motDePasse"]))){
						    	
						    	  
							    if( strlen($_POST['motDePasse']) >= 6){
	   
						             $conn = new PDO("mysql:host=localhost;dbname=authentification", "root", "");
                                    
						            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						            $stmt = $conn->prepare("SELECT id, pseudo, password FROM users WHERE pseudo='$_POST[pseudo]' AND password='$_POST[motDePasse]'");			           
						             $stmt->execute();
						             $row= $stmt->fetch(PDO::FETCH_ASSOC);
						              
						             if ($row['pseudo']==$_SESSION["pseudo"] && $row['password']==$_SESSION["motDePasse"]) {
						             	

						             	 header('Location: logout.php');
                                   exit();
                                   ?>
			                        
			         	            <?php
						             	
						             	}
						             	else{
						             		?>
			                        <div class="alert alert-success alert-dismissible espace">
			         	            <button type="button" class="close" data-dismiss="alert">&times;</button><?php echo "Veuillez vous inscrire";?></div>
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