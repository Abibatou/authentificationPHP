<?php
session_start();
 if (isset($_SESSION["pseudo"])) {

 	# code...
 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/logout.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title></title>
</head>
<body>
	<div class="container">
	<form action="#" method="POST">
		<div class="row">
			<div class=" offset-md-3"></div>
			<div class="col-md-6">
				<div class="alert alert-success alert-dismissible espace">
			         <button type="button" class="close" data-dismiss="alert">&times;</button><?php echo"Connexion etablie !! Bienvenue";?></div>
	<?php echo "Mon nom c'est " . $_SESSION["pseudo"] ;
	echo" et mon mot de passe est "  . $_SESSION["motDePasse"];
?>
	           <input class="btn btn-info espace1 form-control" type="submit" name="monBoutton" value="Logout">
	        </div>
	        <div class=" offset-md-3"></div>
	    </div>
	</form>
	<?php
	if (isset($_POST["monBoutton"])){
session_destroy();
header('location: login.php');
exit;
}
?>

</div>

	</form>

</body>
</html>
<?php
}
else{
	header('location: login.php');
}
?>