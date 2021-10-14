<?php
	 
     require("../connection.php");
       
      if(isset($_GET['email'], $_GET['rand']) AND !empty($_GET['Email']) AND !empty($_GET['rand'])) {
         $email = htmlspecialchars(urldecode($_GET['Email']));
         $rand = htmlspecialchars($_GET['rand']);
         $requser = $db->prepare("SELECT * FROM entreprise_center WHERE Email = ? AND StartoMp = ?");
         $requser->execute(array($email, $rand));
         $userexist = $requser->rowCount();
         if($userexist == 1) {
            $user = $requser->fetch();
            if($user['Statut'] == 0) {
               $updateuser = $bdd->prepare("UPDATE entreprise_center SET Statut = 1 WHERE Email = ? AND StartoMp = ?");
               $updateuser->execute(array($pseudo,$rand));
               header("Location:login.php");
            } else {
               echo "Votre compte a déjà été confirmé !";
            }
         } else {
            echo "L'utilisateur n'existe pas !";
         }
      }
  ?>

