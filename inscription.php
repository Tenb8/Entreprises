<?php 
//require("verif_log.php"); 
 include('../connexion.php');
 print_r($_POST);
 if($_POST['inscription'])
 {
    
   // $mdpstar=trim($_POST['mdpstar']);
    $fonction=trim($_POST['fonction']);
	$what=trim($_POST['what']);
    $userstar=trim($_POST['nom']); 
    $prenom=trim($_POST['prenom']); 
    $entreprise=trim($_POST['entreprise']); 
    $telephone=trim($_POST['telephone']);
    $email=trim($_POST['email']);
    $email2=trim($_POST['email2']);
    $tailleentreprise=trim($_POST['tailleentreprise']); 
    $vente=trim($_POST['vente']); 
	$recouvre=trim($_POST['recouvre']); 
	$fidelisation=trim($_POST['fidelisation']); 
	$service=trim($_POST['service']);
    $abonnement=trim($_POST['abonnement']); 
    $conditions=trim($_POST['conditions']);   
        
    if($userstar && $prenom && $telephone && $email && $entreprise 
	 && $tailleentreprise && $conditions && $what)
    {
        
    srand(); $rand="";
    $alpha="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    for ($i=1;$i<=4;$i++)
      {
        $cp=rand(1,3); srand();
        for ($j=1;$j<=$cp;$j++)
          {
             $ind=rand(0,52); srand();
             $rand.=$alpha[$ind];
          } 
        $rand.=rand(0,1000); srand();
      }
      
    
      
      $date=gmdate("d/m/Y"); 
      $date_en=gmdate("Y-m-d");
    $heure=gmdate("H:i:s");
    
    $ins=$db->exec("INSERT INTO enterprise_connect  values('$userstar','$prenom','$entreprise','$telephone','$tailleentreprise','$email','$conditions',
													'$abonnement','$date_en','$email2','$what',
													'$fonction', '$vente', '$fidelisation', '$service',
													'$recouvre','$heure','$rand','0')");

    if ($ins) 
      {  
    
      $_SESSION['Nom']=$userstar;
      setcookie('identify',$rand,time()+3600*24,null,null,false,true);
      $identity=$_COOKIE['identify'];
  
      header("Location:Choix_categories.php");
      //print("<script type=\"text/javascript\">setTimeout('location=(\"index.php\")',0);</script>");
     
    }
    else
    {
         $msg='<font color="#FF0000">Votre compte n\'a pas &eacute;t&eacute; Enregisté! Réessayez...</font></h3>';
    }
 }
 else
    {
        $msg='Veuillez remplir tous les champs comportant un astérix';
    }
}
$msg='Veuillez remplir tous les champs comportant un astérix';
 ?>
 <!DOCTYPE html>
<html lang="fr">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Starto &#8211; La marketplace des centres de contacts</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="../cssapp/global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
	<link href="../cssapp/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="../cssapp/assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="../cssapp/assets/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="../cssapp/assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="../cssapp/assets/css/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="../cssapp/global_assets/js/main/jquery.min.js"></script>
	<script src="../cssapp/global_assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="../cssapp/global_assets/js/plugins/loaders/blockui.min.js"></script>
	<script src="../cssapp/global_assets/js/plugins/ui/ripple.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="../cssapp/global_assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script src="../cssapp/assets/js/app.js"></script>
	<script src="../cssapp/global_assets/js/demo_pages/login.js"></script>
	<!-- /theme JS files -->

</head>
<body>

	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark bg-indigo navbar-static">
		<div class="navbar-brand">
			<a href="index.html" class="d-inline-block">
				<img src="../upload/logo%402x_white.png" alt="">
			</a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">

			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown">
					<a href="#" class="navbar-nav-link">
						<i class="icon-display4"></i>
						<span class="d-md-none ml-2">Go to website</span>
					</a>					
				</li>

				<li class="nav-item dropdown">
					<a href="#" class="navbar-nav-link">
						<i class="icon-user-tie"></i>
						<span class="d-md-none ml-2">Contact admin</span>
					</a>					
				</li>

				<li class="nav-item dropdown">
					<a href="#" class="navbar-nav-link">
						<i class="icon-cog3"></i>
						<span class="d-md-none ml-2">Options</span>
					</a>					
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->
    
	<section id="content">
          <section class="hbox stretch">
            <section>
              <section class="vbox">
                <section class="scrollable padder">              
                  <section class="row m-b-md">
                      <center>
                      

                      </center>
                  </section>

	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">
				
				<!-- Registration form -->
				<form method="POST" action="inscription.php"  class="flex-fill">
					<div class="row">
						<div class="col-lg-6 offset-lg-3">
							<div class="card mb-0">
								<div class="card-body">
									<div class="text-center mb-3">
										<i class="icon-plus3 icon-2x text-success border-success border-3 rounded-round p-3 mb-3 mt-1"></i>
										<h5 class="mb-0">Créer un compte</h5>
										<span class="d-block text-muted">Tous les champs sont requis</span>
										  <?php echo $msg; ?>
									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="form-group form-group-feedback form-group-feedback-right">
											<input type="text" class="form-control" id="nom" name="nom" placeholder="Nom de famille">
												<div class="form-control-feedback">
													<i class="icon-user-check text-muted"></i>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group form-group-feedback form-group-feedback-right">
											<input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom">
												<div class="form-control-feedback">
													<i class="icon-user-check text-muted"></i>
												</div>
											</div>
										</div>
									</div>

									<div class="form-group form-group-feedback form-group-feedback-right">
									<input type="text" class="form-control" id="entreprise" name="entreprise" placeholder="Entreprise">
										<div class="form-control-feedback">
											<i class="icon-user-plus text-muted"></i>
										</div>
									</div>
									<div class="form-group form-group-feedback form-group-feedback-right">
									<input type="text" class="form-control" id="what" name="what" placeholder="Whatsapp">
										<div class="form-control-feedback">
											<i class="icon-user-plus text-muted"></i>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group form-group-feedback form-group-feedback-right">
											<input type="text" class="form-control" id="telephone" name="telephone" placeholder="Téléphone (000) 00000000">
												<div class="form-control-feedback">
													<i class="icon-phone text-muted"></i>
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group form-group-feedback form-group-feedback-right">
						                        	
							                            
											<select class="form-control" id="tailleentreprise" name="tailleentreprise">
							                                <option value="">Taille de l'entreprise</option>
							                                <option value="Moi uniquement">Moi uniquement</option>
							                                <option value="2-5">2-5</option>
							                                <option value="6-10">6-10</option>
							                                <option value="11-20">11-20</option>
							                                <option value="21-30">21-30</option>
							                                <option value="30 et plus">30 et plus</option>
							                                
							                            </select>
						                            
						                        </div>
										</div>
									</div>
									<div class="row">
									<div class="col-md-6">
											<div class="form-group form-group-feedback form-group-feedback-right">
						                        	
							                            
											<select class="form-control" id="vente" name="vente">
							                                <option value="">Vente</option>
							                                <option value="Trouver des leads">Trouver des leads</option>
							                                <option value="Qualifier vos leads">Qualifier vos leads</option>
							                                <option value="Prendre des RDV">Prendre des RDV</option>
							                                <option value="Vendre Plus">Vendre Plus</option>
							                                <option value="Je ne sais pas conseillez-moi">Je ne sais pas conseillez-moi</option>
							                                 
							                            </select>
						                            
						                        </div>
										</div>

										<div class="col-md-6">
											<div class="form-group form-group-feedback form-group-feedback-right">
						                        	
							                            
											<select class="form-control" id="service" name="service">
							                                <option value="">Service Client</option>
							                                <option value="Assistance technique">Assistance techniquet</option>
							                                <option value="Service client front office">Service client front office</option>
							                                <option value="Service client Back office">Service client Back office</option>
							                                <option value="Je ne sais pas conseillez-moi">Je ne sais pas conseillez-moi</option>
							                              
							                            </select>
						                            
						                        </div>
										</div>
									</div>
									<div class="row">
									<div class="col-md-6">
											<div class="form-group form-group-feedback form-group-feedback-right">
						                        	
							                            
											<select class="form-control" id="recouvre" name="recouvre">
							                                <option value="">Recouvrement</option>
							                                <option value="Recouvrement amiable">Recouvrement amiable</option>
							                                <option value="Contentieux">Contentieux</option>
							                                <option value="Je ne sais pas conseillez-moi">Je ne sais pas conseillez-moi</option>
							                                
							                            </select>
						                            
						                        </div>
										</div>

										<div class="col-md-6">
											<div class="form-group form-group-feedback form-group-feedback-right">
						                        	
							                            
											<select class="form-control" id="fidelisation" name="fidelisation">
							                                <option value="">Fidélisation</option>
							                                <option value="Enquête de satisfaction">Enquête de satisfaction</option>
							                                <option value="Fidélisation client appel sortants">Fidélisation client appel sortants</option>
							                                <option value="Reconquête">Reconquête</option>
							                                <option value="Rétention anti-churn">Rétention anti-churn</option>
							                                <option value="Je ne sais pas conseillez-moi">Je ne sais pas conseillez-moi</option>
							                                
							                                
							                            </select>
						                            
						                        </div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group form-group-feedback form-group-feedback-right">
											<input type="password" class="form-control" name="mdpstar"   placeholder="Créer un mot de passe">
												<div id="p1"></div>
												<div class="form-control-feedback">
													<i class="icon-user-lock text-muted"></i>
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group form-group-feedback form-group-feedback-right">
											<input type="text" class="form-control" id="fonction"   name="fonction" placeholder="  Fonction">
										
												<div class="form-control-feedback">
													<i class="icon-user-lock text-muted"></i>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="form-group form-group-feedback form-group-feedback-right">
											<input type="email" class="form-control" id="email2" name="email2"   placeholder=" email Professionnel">
												<div id="p3"></div>
												<div class="form-control-feedback">
													<i class="icon-mention text-muted"></i>
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group form-group-feedback form-group-feedback-right">
											<input type="email" class="form-control" id="email" name="email"   placeholder="email Principal">
												<div class="form-control-feedback">
													<i class="icon-mention text-muted"></i>
												</div>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="form-check">
											<label class="form-check-label">
												<input type="checkbox" class="form-input-styled" value="1" id="parametres" name="parametres"  data-fouc>
												Envoyez-moi <a href="#">les paramètres du compte de test</a>
											</label>
										</div>
                         
										<div class="form-check">
											<label class="form-check-label">
												<input type="checkbox" class="form-input-styled" value="1" id="abonnement" name="abonnement"  data-fouc>
												Abonnez-vous à la newsletter mensuelle
											</label>
										</div>

										<div class="form-check">
											<label class="form-check-label">
												<input type="checkbox" class="form-input-styled" value="1" id="conditions" name="conditions" data-fouc>
												Accepter les <a href="#">conditions d'utilisation</a>
											</label>
										</div>
									</div>

									<button type="submit" name="inscription" class="btn bg-teal-400 btn-labeled btn-labeled-right" value="Créer un compte"><b><i class="icon-plus3"></i></b> Créer un compte</button>
								</div>
							</div>
						</div>
					</div>
				</form>
				<!-- /registration form -->

			</div>
			<!-- /content area -->


			<!-- Footer -->
			<div class="navbar navbar-expand-lg navbar-light">
				<div class="text-center d-lg-none w-100">
					<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
						<i class="icon-unfold mr-2"></i>
						Footer
					</button>
				</div>

				<div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text">
						&copy; 2020 - 2021. <a href="#">Starto</a> by <a href="#" target="_blank">OPT-IN</a>
					</span>

					<ul class="navbar-nav ml-lg-auto">
						<li class="nav-item"><a href="#" class="navbar-nav-link" target="_blank"><i class="icon-lifebuoy mr-2"></i> Support</a></li>
						<li class="nav-item"><a href="#" class="navbar-nav-link" target="_blank"><i class="icon-file-text2 mr-2"></i> Docs</a></li>
						<li class="nav-item"><a href="#" class="navbar-nav-link font-weight-semibold"><span class="text-pink-400"><i class="icon-cart2 mr-2"></i> Purchase</span></a></li>
					</ul>
				</div>
			</div>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>

<script>
		
        function Validate () {
          // console.log("test");
		    var content="";
            var a = document.getElementById("password").value;
            var b = document.getElementById("confirmpassword").value;
            if (a!=b) {
				content="<p>mot de passe incorrecte</p>";
				$("#p1").html(content);
				$("#p2").html(content);
			   $("#Valider").attr("disabled","disabled");
               return false;
            }else
			{
               $("#Valider").removeAttr("disabled");
			   content="<p></p>";
				$("#p1").html(content);
				$("#p2").html(content);
			}
			
        }


		function Validate1 () {
          // console.log("test");
		    var content1="";
            var a = document.getElementById("email").value;
            var b = document.getElementById("confirmemail").value;
            if (a!=b) {
				content1="<p>Email incorrecte</p>";
				$("#p3").html(content1);
				$("#p4").html(content1);
			   $("#Valider").attr("disabled","disabled");
               return false;
            }else
			{
               $("#Valider").removeAttr("disabled");
			   content1="<p></p>";
				$("#p1").html(content1);
				$("#p2").html(content1);
			}
			
        }


		
     </script>


</html>
