﻿<?php
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'demandeConnexion';
}
$action = $_REQUEST['action'];
switch($action){
	case 'demandeConnexion':{
		include("vues/v_connexion.php");
		break;
	}
	case 'valideConnexion':{
		$login = $_REQUEST['login'];
		$mdp = $_REQUEST['mdp'];
                
                 //ici apel du cryptage du mot de passe envoyer au programe

                /*$mdpCrypte =  $pdo->getUtilisateurMotDePasseCryptage();
                foreach ($mdpCrypte as $micka)
			{
                    $unmotdepasse = $micka['mdp'];
                    $unUtilisateur = $micka['login'];
                    $cryptage = crypt($login,$unmotdepasse);
                    $pdo->MiseAjourCryptageDansBaseDeDonnée($cryptage,$unUtilisateur);
                }*/
                
                $cryptage = crypt($login,$mdp);
                
		$visiteur = $pdo->getInfosVisiteur($login,$cryptage);
		if(!is_array( $visiteur)){
                    
			ajouterErreur("Login ou mot de passe incorrect");
			include("vues/v_erreurs.php");
			include("vues/v_connexion.php");
		}
		else{
			$id = $visiteur['id'];
			$nom =  $visiteur['nom'];
			$prenom = $visiteur['prenom'];
                        $type=$visiteur['type'];
			connecter($id,$nom,$prenom,$type);
			include("vues/v_sommaire.php");
		}
		break;
	}
	default :{
		include("vues/v_connexion.php");
		break;
	}
}
?>