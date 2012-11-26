<?php 
include("vues/v_sommaire.php");
$action = $_REQUEST['action'];
$idVisiteur = $_SESSION['idVisiteur'];
$unID;
$unMois;
$UnMontantTotalValide = 0;

switch($action){
        
        case 'Actualisation':
        { 
                $_REQUEST['lstMois']= $_SESSION['mois'];
                $_REQUEST['lstUtilisateur'] = $_SESSION['login'];
                $MoisAvalider=$pdo->getLesMoisAvalider();
                $UtilisateurAvalider = $pdo->getLesUtilisateurAvalider();
		$moisASelectionner2 = $_SESSION['mois'];
                $utilisateurAselectionner =$_SESSION['login'];
		include("vues/v_validation.php");
                global $unID ;
                global $unMOIS ;
                $unMOIS = $_SESSION['mois'];
                $unID = $_SESSION['login'];
                ////condition if a faire ici 
                //pour savoir si les champ des liste sont bon sinon afficher erreur
                $conditionOk = $pdo->getLesFrais($_SESSION['login'],$_SESSION['mois']);              
                if($conditionOk == 0)
                {
                    ajouterErreur("Pas de fiche de frais pour ce visiteur ce mois ou fiche de frais déjà validée");
                    include("vues/v_erreurs.php"); 
             
                }
                else
                {
		$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($_SESSION['login'],$_SESSION['mois']);
		$lesFraisForfait= $pdo->getLesFraisForfait($_SESSION['login'],$_SESSION['mois']);
		$lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($_SESSION['login'],$_SESSION['mois']);              
		$numAnnee =substr( $_SESSION['mois'],0,4);
		$numMois =substr( $_SESSION['mois'],4,2);
		$libEtat = $lesInfosFicheFrais['libEtat'];
		$montantValide = $lesInfosFicheFrais['montantValide'];
		$nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
		$dateModif =  $lesInfosFicheFrais['dateModif'];
		$dateModif =  dateAnglaisVersFrancais($dateModif);
                
                /*partie qui recupere les valeur des différents frais afin de les calculer*/
                $LesForfaitEtape = $pdo->getValeurForfaitEtape();               
                $LesFraisKilometrique = $pdo->getValeurFraisKilométrique();              
                $LesFraisNuiteHotel = $pdo->getValeurForfaitNuiteHotel();               
                $LesFraisRepasRestaurant = $pdo->getValeurForfaitNuiteRestaurant();
                
                $FraisEtapeUtilisateur = $pdo->getValeurFraisEtapeUtilisateur($_SESSION['login'],$_SESSION['mois']);
                $FraisKilometriqueUtilisateur = $pdo->getValeurFraisKilometriqueUtilisateur($_SESSION['login'],$_SESSION['mois']);
                $FraisNuiteHotelUtilisateur = $pdo->getValeurFraisNuiteHotelUtilisateur($_SESSION['login'],$_SESSION['mois']);
                $FraisRepasRestaurantUtilisateur = $pdo->getValeurFraisRepasRestaurantUtilisateur($_SESSION['login'],$_SESSION['mois']); 
                $TotalFraisHorsForfaitUtilisateur = $pdo->getValeurFraisHorsForfaitUtilisateur($_SESSION['login'],$_SESSION['mois']);
                $MontantTotalValide = (($LesForfaitEtape*$FraisEtapeUtilisateur)+($LesFraisKilometrique*$FraisKilometriqueUtilisateur)+($LesFraisNuiteHotel*$FraisNuiteHotelUtilisateur)+($LesFraisRepasRestaurant*$FraisRepasRestaurantUtilisateur)+$TotalFraisHorsForfaitUtilisateur);              
                include("vues/v_validationComptable.php"); 
                echo'Montant Valide: '.$MontantTotalValide;
                include("vues/v_listeFraisForfaitComptable.php");
                include("vues/v_listeFraisHorsForfaitComptable.php");
                }
            break;
        
        }
	case 'validation':
        {            
                
		$MoisAvalider=$pdo->getLesMoisAvalider();
                $UtilisateurAvalider = $pdo->getLesUtilisateurAvalider();
		// Afin de sélectionner par défaut le dernier mois dans la zone de liste
		// on demande toutes les clés, et on prend la première,
		// les mois étant triés décroissants
		$lesCles2 = array_keys($MoisAvalider);
                $lesCles3 = array_keys($UtilisateurAvalider);
		$moisASelectionner2 = $lesCles2[0];
                $utilisateurAselectionner = $lesCles3[0];
		include("vues/v_validation.php");
		break;
	}
	case 'voirValidation':
        {
            
		$leMois = $_REQUEST['lstMois'];
                $levisiteur = $_REQUEST['lstUtilisateur'];
                $_SESSION['login'] = $levisiteur;
                $_SESSION['mois'] = $leMois;
      		$MoisAvalider=$pdo->getLesMoisAvalider();
                $UtilisateurAvalider = $pdo->getLesUtilisateurAvalider();
		$moisASelectionner2 = $leMois;
                $utilisateurAselectionner =$levisiteur;
		include("vues/v_validation.php"); 
                global $unID ;
                global $unMOIS ;
                $unMOIS = $leMois;
                $unID = $levisiteur;
                ////condition if a faire ici 
                //pour savoir si les champ des liste sont bon sinon afficher erreur
                $conditionOk = $pdo->getLesFrais($levisiteur,$leMois);              
                if($conditionOk == 0)
                {
                    ajouterErreur("Pas de fiche de frais pour ce visiteur ce mois ou fiche de frais déjà validée");
                    include("vues/v_erreurs.php"); 
             
                }
                else
                {
		$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($levisiteur,$leMois);
		$lesFraisForfait= $pdo->getLesFraisForfait($levisiteur,$leMois);
		$lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($levisiteur,$leMois);              
		$numAnnee =substr( $leMois,0,4);
		$numMois =substr( $leMois,4,2);
		$libEtat = $lesInfosFicheFrais['libEtat'];
		$montantValide = $lesInfosFicheFrais['montantValide'];
		$nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
		$dateModif =  $lesInfosFicheFrais['dateModif'];
		$dateModif =  dateAnglaisVersFrancais($dateModif);
                
                /*partie qui recupere les valeur des différents frais afin de les calculer*/
                $LesForfaitEtape = $pdo->getValeurForfaitEtape();               
                $LesFraisKilometrique = $pdo->getValeurFraisKilométrique();              
                $LesFraisNuiteHotel = $pdo->getValeurForfaitNuiteHotel();               
                $LesFraisRepasRestaurant = $pdo->getValeurForfaitNuiteRestaurant();               
                $FraisEtapeUtilisateur = $pdo->getValeurFraisEtapeUtilisateur($levisiteur,$leMois);
                $FraisKilometriqueUtilisateur = $pdo->getValeurFraisKilometriqueUtilisateur($levisiteur,$leMois);
                $FraisNuiteHotelUtilisateur = $pdo->getValeurFraisNuiteHotelUtilisateur($levisiteur,$leMois);
                $FraisRepasRestaurantUtilisateur = $pdo->getValeurFraisRepasRestaurantUtilisateur($levisiteur,$leMois); 
                $TotalFraisHorsForfaitUtilisateur = $pdo->getValeurFraisHorsForfaitUtilisateur($levisiteur,$leMois);
                $MontantTotalValide = (($LesForfaitEtape*$FraisEtapeUtilisateur)+($LesFraisKilometrique*$FraisKilometriqueUtilisateur)+($LesFraisNuiteHotel*$FraisNuiteHotelUtilisateur)+($LesFraisRepasRestaurant*$FraisRepasRestaurantUtilisateur)+$TotalFraisHorsForfaitUtilisateur);              
                global $UnMontantTotalValide;
                $_SESSION['montantValide']=$MontantTotalValide;
                include("vues/v_validationComptable.php"); 
                echo'Montant Valide: '.$MontantTotalValide;              
                include("vues/v_listeFraisForfaitComptable.php");
                include("vues/v_listeFraisHorsForfaitComptable.php");              
                
                break;
                }
        }       
         case 'validationComptable':
        {
                
                global $unID;
                global $unMOIS;
                global $UnMontantTotalValide;
                
                $pdo->ValidationParComptable($_SESSION['login'],$_SESSION['mois']);
                $pdo->MiseAjourMontantValide($_SESSION['montantValide'],$_SESSION['login'],$_SESSION['mois']);              
                include("vues/v_ConfirmationValidationComptable.php");
                break;
	}
        case 'supprimerFrais':
        {
		$idFrais = $_REQUEST['idFrais'];
                $pdo->supprimerFraisHorsForfait($idFrais);
                include("vues/v_ConfirmationSuppressionComptable.php");
		break;
	}
        
        
        
}
?>