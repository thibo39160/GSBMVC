<?php
require_once("include/fct.inc.php");
require_once ("include/class.pdogsb.inc.php");
include("vues/v_entete.php");
session_start();
$pdo = PdoGsb::getPdoGsb(); 
$estConnecte = estConnecte();

if(!isset($_REQUEST['uc']) || !$estConnecte){
     $_REQUEST['uc'] = 'connexion';
}	

//cryptage de l'ensemble de la base de donnée
 
/*$cryptage = $pdo->getUtilisateurMotDePasseCryptage();
$lesCles3 = array_keys($cryptage);
$iteration = $lesCles3[0];

foreach ($cryptage as $unCrypt)
			{
			    $unLogin = $unCrypt['login'];
                            $unMdp = $unCrypt['mdp'];
                            $MonCryptage =crypt($unLogin, $unMdp);
                            $pdo->MiseAjourCryptageDansBaseDeDonnée($MonCryptage,$unLogin);
			}*/
$uc = $_REQUEST['uc'];
switch($uc){
	case 'connexion':{
		include("controleurs/c_connexion.php");break;
	}
	case 'gererFrais' :{
		include("controleurs/c_gererFrais.php");break;
	}
	case 'etatFrais' :{
		include("controleurs/c_etatFrais.php");break; 
	}
        case 'validation':{
		include("controleurs/c_validation.php");break;
	}
        case 'suivie' :{
		include("controleurs/c_suivie.php");break; 
        }
}
include("vues/v_pied.php") ;
?>

