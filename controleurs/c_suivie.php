<?php
include("vues/v_sommaire.php");
$action = $_REQUEST['action'];
$idVisiteur = $_SESSION['idVisiteur'];
switch($action){
	case 'selectionVisiteur':{     
                // Requete pour infos visiteur VA
                $lesvisiteurs=$pdo->getInfosVisiteurValide();
                $lescles2 = array_keys($lesvisiteurs);
                $utilisateurASelectionner=$lescles2[0];
               
                //Requete pour les mois
                global $Visiteur;
                $lesMois=$pdo->getLesMoisDisponiblesVisiteurValide($Visiteur);
		// Afin de sélectionner par défaut le dernier mois dans la zone de liste
		// on demande toutes les clés, et on prend la première,
		// les mois étant triés décroissants
		$lesCles = array_keys($lesMois);
		$moisASelectionner = $lesCles[0];
		include("vues/v_selection.php");
		break;
	}
	case 'montantValidee':{
		$leMois = $_REQUEST['lstMois']; 
                global $Visiteur;
		$lesMois=$pdo->getLesMoisDisponibles($Visiteur);
                $moisASelectionner = $leMois;
		include("vues/v_selection.php");
                $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($Visiteur,$leMois);
		$lesFraisForfait= $pdo->getLesFraisForfait($Visiteur,$leMois);
		$lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur,$leMois);
		$numAnnee =substr( $leMois,0,4);
		$numMois =substr( $leMois,4,2);
		$libEtat = $lesInfosFicheFrais['libEtat'];
		$montantValide = $lesInfosFicheFrais['montantValide'];
		$nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
		$dateModif =  $lesInfosFicheFrais['dateModif'];
		$dateModif =  dateAnglaisVersFrancais($dateModif);
		include("vues/v_monantValidee.php");
	}
}







?>
