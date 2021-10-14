<?php 
 include("../connection.php");
session_start();
if($_POST['log'])
{
  $starmail=htmlspecialchars($_POST['email']);
  $mdpstar=sha1($_POST['mdpstar']);
  if(!empty($starmail) AND !empty($mdpstar))
  {
    $conn=$db->prepare("SELECT * from entreprise_connect where Email=? AND StartoMp=?");
	$conn->execute(array($starmail, $mdpstar));
    $trouve=$conn->rowCount();
    if($trouve == 1)
    {

		$donnees=$conn->fetch();
		$_SESSION['entreid'] = $donnees['entreid'];
      $_SESSION['Nom']=$donnees['Nom'];
	  $_SESSION['Email'] = $donnees['Email'];
      /*$donnees=$conn->fetchObject();
      $_SESSION['Nom']=$donnees->Nom;
      setcookie('identify',$donnees->Aleatoire,time()+3600*24,null,null,false,true);
      $identity=$_COOKIE['identify'];*/
  
      header("Location:index.php?entreid=".$_SESSION['entreid']);
      //print("<script type=\"text/javascript\">setTimeout('location=(\"index.php\")',0);</script>");
    }
    else
    {
      $msg="Nom d'utilisateur ou mot de passe incorrecte !";
    }
  }
  else
  {
    $msg="Veuilez renseigner tous les champs !";
  }
}
/*if($_COOKIE['identify'])
{
 $identity=$_COOKIE['identify'];
 $okok=$db->query("SELECT * from inscriptions where Aleatoire='$identity'");
 $conn= $okok->fetchObject();
      
      $statut=$donnees->statut; 
       setcookie('identify',$identify,time()+3600*24,null,null,false,true);
      if($statut==0)
      {
        header("Location:index.php");
        //print("<script type=\"text/javascript\">setTimeout('location=(\"index.php\")',0);</script>");
      }
      else
      {
         header("Location:login.php");
        //print("<script type=\"text/javascript\">setTimeout('location=(\"login.php\")',0);</script>");
      }
      */
if($_GET['logout'])
{ 
  session_destroy();
  unset($_SESSION['entreid']);
  unset($_SESSION['Nom']);
 header("Location:login.php");
  //print("<script type=\"text/javascript\">setTimeout('location=(\"login.php\")',0);</script>");
}

?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Starto &#8211; La marketplace des centres de contacts</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="../cssapp/global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="../assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="../assets/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="../assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="../assets/css/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="../cssapp/global_assets/js/main/jquery.min.js"></script>
	<script src="../cssapp/global_assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="../cssapp/global_assets/js/plugins/loaders/blockui.min.js"></script>
	<script src="../cssapp/global_assets/js/plugins/ui/ripple.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="../cssapp/global_assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script src="../cssapp/assets/js/app.js"> </script>
	<script src="../cssapp/global_assets/js/demo_pages/login.js"></script>
	<!-- /theme JS files -->

</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark bg-indigo navbar-static">
		<div class="navbar-brand">
			<a href="index.html" class="d-inline-block">
				<img  src="../upload/logo%402x_white.png" alt="">
			</a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
		</div>

		
	</div>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">

				<!-- Login form -->
				<form class="login-form" action="" method="POST" class="flex-fill">
					<div class="card mb-0">
						<div class="card-body">
							<div class="text-center mb-3">
								<i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
								<h5 class="mb-0">Connectez-vous à votre compte</h5>
								<span class="d-block text-muted">Vos identifiants</span>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="text" id="email" name="email" class="form-control" placeholder="Votre email">
								<div class="form-control-feedback">
									<i class="icon-mention text-muted"></i>
								</div>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="password" id="password" name="mdpstar" class="form-control" placeholder="Mot de passe">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group d-flex align-items-center">
								<div class="form-check mb-0">
									<label class="form-check-label">
										<input type="checkbox" name="remember" class="form-input-styled" checked data-fouc>
										Rappelles toi
									</label>
								</div>

								<a href="motpasseoublie.php" class="ml-auto">Mot de passe oublié ?</a>
							</div>

							<div class="form-group">
								<button type="submit"  name="log" class="btn btn-primary btn-block" value="S'IDENTIFIER">S'IDENTIFIER <i class="icon-circle-right2 ml-2"></i></button>
							</div>

							<div class="form-group text-center text-muted content-divider">
								<span class="px-2">ou connectez-vous avec</span>
							</div>

							<div class="form-group text-center">
								<button type="button" class="btn btn-outline bg-indigo border-indigo text-indigo btn-icon rounded-round border-2"><i class="icon-facebook"></i></button>
								<button type="button" class="btn btn-outline bg-pink-300 border-pink-300 text-pink-300 btn-icon rounded-round border-2 ml-2"><i class="icon-dribbble3"></i></button>
								<button type="button" class="btn btn-outline bg-slate-600 border-slate-600 text-slate-600 btn-icon rounded-round border-2 ml-2"><i class="icon-github"></i></button>
								<button type="button" class="btn btn-outline bg-info border-info text-info btn-icon rounded-round border-2 ml-2"><i class="icon-twitter"></i></button>
							</div>

							<div class="form-group text-center text-muted content-divider">
								<span class="px-2">Vous n'avez pas de compte ?</span>
							</div>

							<div class="form-group">
								<a href="inscription.php" class="btn btn-light btn-block">S'INSCRIRE</a>
							</div>

							<span class="form-text text-center text-muted">En continuant, vous confirmer que vous avez lu nos <a href="#">Conditions Générales d'Utilisation</a> et <a href="#">Politique de cookies</a></span>
						</div>
					</div>
				</form>
				<!-- /login form -->

			</div>
			<!-- /content area -->


			<!-- Footer -->
		<?php include('footer.php'); ?>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>

</html>
